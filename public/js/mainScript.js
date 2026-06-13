
let activePage = document.querySelector('div[pageName]');
let viewName = activePage?.getAttribute('pageName');
let allErrors = [];


// recuperation des scripts nécésaire en fonction de la page à afficher
let scriptsToLoad = ["./interactiveMessage.js", "./burger.js"];
if (viewName === 'accueil') {

    scriptsToLoad.push(
        "./weather.js",
        "./slider.js"
    );

} else if (viewName === 'itineraryZoom') {

    scriptsToLoad.push(
        './my_leaflet.js',
        './comment.js'
    );
}else if (viewName === 'eventZoom') {

    scriptsToLoad.push(
        './comment.js'
    );
}

async function loadScriptFromPath(path) {
    try {
        return await import(path);
    } catch (err) {
        // 🔒 Logique de LOGGING CONSERVÉE
        allErrors.push({ script: path, error: err.message });

        // Relancer l'erreur pour que le bloc catch principal puisse la gérer
        throw err;
    }
}

(async function loadScript() {
    try {

        let promises;

        // GESTION SPÉCIFIQUE POUR LA PAGE ITINERAIRE ZOOM
        if (viewName === 'itineraryZoom') {
            // await loadScriptFromPath('https://unpkg.com/leaflet@1.9.4/dist/leaflet.js');
            await new Promise((resolve, reject) => {
                const script = document.createElement('script');
                script.src = "https://unpkg.com/leaflet@1.9.4/dist/leaflet.js";
                script.onload = resolve;
                script.onerror = reject;
                document.head.appendChild(script);
            });
            if (typeof L === 'undefined') {
                throw new Error("Leaflet a chargé mais l'objet L est introuvable.");
            }

        }
        promises = scriptsToLoad.map(path => loadScriptFromPath(path));
        await Promise.all(promises);

    } catch (globalError) {
        console.warn("Problème de chargement d\'un script:", globalError);
        fetch('/api/log_error.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                script: 'Global Load Failure',
                error: globalError.message || String(globalError)
            })
        }).catch(fetchErr => {
            console.warn("Impossible d'envoyer le log au serveur");
        });
    }
})(); // La double parenthèse finale déclenche l'éxécution immédiate de la fonction