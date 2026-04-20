// weather.js

// Codes WMO pour les conditions météo
let WEATHER_CODES = {
  0: { icon: '☀️', label: 'Ciel dégagé' },
  1: { icon: '🌤️', label: 'Principalement clair' },
  2: { icon: '⛅', label: 'Partiellement nuageux' },
  3: { icon: '☁️', label: 'Couvert' },
  45: { icon: '🌫️', label: 'Brume' },
  48: { icon: '🌫️', label: 'Brouillard givrant' },
  51: { icon: '🌧️', label: 'Bruine légère' },
  53: { icon: '🌧️', label: 'Bruine modérée' },
  55: { icon: '🌧️', label: 'Bruine dense' },
  61: { icon: '🌧️', label: 'Pluie faible' },
  63: { icon: '🌧️', label: 'Pluie modérée' },
  65: { icon: '🌧️', label: 'Pluie forte' },
  71: { icon: '❄️', label: 'Neige faible' },
  73: { icon: '❄️', label: 'Neige modérée' },
  75: { icon: '❄️', label: 'Neige forte' },
  80: { icon: '🌦️', label: 'Averses légères' },
  81: { icon: '🌦️', label: 'Averses modérées' },
  82: { icon: '🌦️', label: 'Averses fortes' },
  95: { icon: '⛈️', label: 'Orage' },
  96: { icon: '⛈️', label: 'Orage avec grêle' },
  99: { icon: '⛈️', label: 'Orage fort avec grêle' }
};

async function fetchWeather() {
  try {
    let response = await fetch(
      'https://api.open-meteo.com/v1/forecast?latitude=47.7482&longitude=-3.3718&hourly=temperature_2m,precipitation_probability,wind_speed_10m,wind_direction_10m&forecast_days=1'
    );
    
    if (!response.ok) throw new Error('Erreur API');
    
    let data = await response.json();
    updateUI(data);
  } catch (error) {
    showError(error.message);
  }
}

function updateUI(data) {
  // Heure actuelle pour trouver l'index
  let now = new Date();
  let currentHour = now.getHours();
  console.log(currentHour);
  
  // Trouver l'index de l'heure actuelle dans les données horaires
  let hourlyIndex = data.hourly.time.findIndex(time => {
    let hourTime = new Date(time);
    console.log(hourTime);
    return hourTime.getHours() === currentHour;
  });
  
  let currentIndex = hourlyIndex >= 0 ? hourlyIndex : 0;
  
  // Mettre à jour la météo actuelle
  document.getElementById('current-temp').textContent = `${Math.round(data.hourly.temperature_2m[currentIndex])}°C`;
  document.getElementById('wind-speed').textContent = `${Math.round(data.hourly.wind_speed_10m[currentIndex])} km/h`;
  document.getElementById('wind-dir').textContent = `${Math.round(data.hourly.wind_direction_10m[currentIndex])}°`;
  document.getElementById('precip-prob').textContent = `${data.hourly.precipitation_probability[currentIndex]}%`;
  
  // Condition météo
  let weatherCode = data.hourly.weathercode?.[currentIndex] || 0;
  let weatherInfo = WEATHER_CODES[weatherCode] || WEATHER_CODES[0];
  document.getElementById('weather-icon').textContent = weatherInfo.icon;
  document.getElementById('condition').textContent = weatherInfo.label;
  
  // Prévisions horaires
  renderHourlyForecast(data.hourly, currentIndex);
}

function renderHourlyForecast(hourly, activeIndex) {
  let container = document.getElementById('hourly-forecast');
  container.innerHTML = '';
  
  // Afficher les 24 heures
  for (let i = 0; i < Math.min(hourly.time.length, 24); i+=4) {
    let time = new Date(hourly.time[i]);
    let hour = time.getHours();
    let temp = Math.round(hourly.temperature_2m[i]);
    let precip = hourly.precipitation_probability[i];
    let wind = Math.round(hourly.wind_speed_10m[i]);
    let weatherCode = hourly.weathercode?.[i] || 0;
    let weatherInfo = WEATHER_CODES[weatherCode] || WEATHER_CODES[0];
    
    let card = document.createElement('div');
    card.className = `hourly-card ${i === activeIndex ? 'active' : ''}`;
    card.innerHTML = `
      <div class="hourly-time">${hour}:00</div>
      <div class="hourly-icon">${weatherInfo.icon}</div>
      <div class="hourly-temp">${temp}°</div>
      <div class="hourly-wind">${wind}km/h</div>
      <div class="hourly-rain">${precip}%</div>
    `;
    
    container.appendChild(card);
  }
}

function showError(message) {
  let container = document.querySelector('.weather-container');
  container.innerHTML = `<div class="error">Erreur: ${message}</div>`;
}

// Charger au démarrage
document.addEventListener('DOMContentLoaded', fetchWeather);

// Rafraîchir toutes les 30 minutes
setInterval(fetchWeather, 1800000);