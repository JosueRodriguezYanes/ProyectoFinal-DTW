document.addEventListener('DOMContentLoaded', () => {
  const container = document.getElementById('datos-api')
  if (!container) return

  axios.get('https://api.publicapis.org/entries')
    .then(response => {
      const entries = response.data.entries.slice(0, 5)
      let html = '<ul class="list-group mt-3">'
      entries.forEach(e => {
        html += `<li class="list-group-item"><strong>${e.API}</strong> - ${e.Description}</li>`
      })
      html += '</ul>'
      container.innerHTML = html
    })
    .catch(error => {
      container.innerHTML = '<p>Error cargando datos externos.</p>'
      console.error(error)
    })
})
