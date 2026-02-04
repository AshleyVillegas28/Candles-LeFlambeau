const API_URL = "https://mvc-php-web-latest.onrender.com/velas.php";
const CATEGORIES_API = "https://mvc-php-web-latest.onrender.com/categorias.php";

// Listar velas
async function cargarVelas(buscar = "") {
  const res = await fetch(API_URL + (buscar ? `?b=${encodeURIComponent(buscar)}` : ""));
  const data = await res.json();

  const tbody = document.querySelector('#tablaVelas');
  if (!tbody) return;

  tbody.innerHTML = "";
  data.forEach((v) => {
    tbody.innerHTML += `
      <tr>
        <td>${v.id_vela}</td>
        <td>${v.nombre}</td>
        <td>${v.descripcion}</td>
        <td>${v.precio}</td>
        <td>${v.stock}</td>
        <td>${v.aroma || ''}</td>
        <td>${v.color || ''}</td>
        <td>${v.categoria || ''}</td>
        <td>
          <a class="btn btn-sm btn-primary" href="Evela.html?id=${v.id_vela}">Editar</a>
          <button class="btn btn-sm btn-danger" onclick="eliminarVela(${v.id_vela})">Eliminar</button>
        </td>
      </tr>
    `;
  });
}

// Eliminar vela
async function eliminarVela(id) {
  if (!confirm('¿Está seguro de eliminar esta vela?')) return;
  const res = await fetch(`${API_URL}?id_vela=${id}`, { method: 'DELETE' });
  const data = await res.json();
  if (data.success) cargarVelas();
}

// Cargar categorías para el select (usado en crear/editar)
async function cargarCategoriasSelect() {
  const res = await fetch(CATEGORIES_API);
  const cats = await res.json();
  const sel = document.querySelector('select[name="id_categoria"]');
  if (!sel) return;
  sel.innerHTML = '<option value="">Seleccione...</option>';
  cats.forEach((c) => {
    sel.innerHTML += `<option value="${c.id_categoria}">${c.nombre}</option>`;
  });
}

// Crear
function handleNuevoVela() {
  const form = document.querySelector('#formNuevoVela');
  if (!form) return;

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const fd = new FormData(form);
    const body = {
      nombre: fd.get('nombre'),
      descripcion: fd.get('descripcion'),
      precio: parseFloat(fd.get('precio')) || 0,
      stock: parseInt(fd.get('stock'), 10) || 0,
      aroma: fd.get('aroma'),
      color: fd.get('color'),
      id_categoria: parseInt(fd.get('id_categoria'), 10) || null
    };

    const res = await fetch(API_URL, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(body)
    });
    const data = await res.json();
    if (data.success) window.location.href = 'Lvela.html';
  });
}

// Editar
function handleEditarVela() {
  const form = document.querySelector('#formEditarVela');
  if (!form) return;

  const params = new URLSearchParams(window.location.search);
  const id = params.get('id');
  if (!id) return;

  // traer vela
  fetch(`${API_URL}?b=${id}`)
    .then(r => r.json())
    .then(data => {
      const vela = data[0];
      if (!vela) return;
      form.id_vela.value = vela.id_vela;
      form.nombre.value = vela.nombre;
      form.descripcion.value = vela.descripcion;
      form.precio.value = vela.precio;
      form.stock.value = vela.stock;
      form.color.value = vela.color;
      form.aroma.value = vela.aroma;
      // esperar que el select esté cargado
      setTimeout(()=>{
        const sel = document.querySelector('select[name="id_categoria"]');
        if (sel) sel.value = vela.id_categoria || '';
      }, 300);
    });

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const fd = new FormData(form);
    const body = {
      id_vela: parseInt(fd.get('id_vela'), 10),
      nombre: fd.get('nombre'),
      descripcion: fd.get('descripcion'),
      precio: parseFloat(fd.get('precio')) || 0,
      stock: parseInt(fd.get('stock'), 10) || 0,
      aroma: fd.get('aroma'),
      color: fd.get('color'),
      id_categoria: parseInt(fd.get('id_categoria'), 10) || null
    };

    const res = await fetch(API_URL, {
      method: 'PUT',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(body)
    });
    const data = await res.json();
    if (data.success) window.location.href = 'Lvela.html';
  });
}