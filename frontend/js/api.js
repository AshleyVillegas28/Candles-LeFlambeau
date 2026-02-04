const API_URL = "https://mvc-php-web-latest.onrender.com";

async function cargarCategorias() {
  const res = await fetch(`${API_URL}/categorias.php`);
  const data = await res.json();

  const tbody = document.querySelector("#tablaCategorias");
  tbody.innerHTML = "";

  data.forEach((cat) => {
    tbody.innerHTML += `
      <tr>
        <td>${cat.id_categoria}</td>
        <td>${cat.nombre}</td>
        <td>${cat.descripcion}</td>
      </tr>
    `;
  });
}

document.addEventListener("DOMContentLoaded", cargarCategorias);
