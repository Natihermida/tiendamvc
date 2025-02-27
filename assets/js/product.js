fetch("http://localhost/tiendamvc/api/categories")
  .then((data) => data.json())
  .then((datos) => {
    datos.forEach((element) => {
      let option = document.createElement("option");
      option.value = element.category_id;
      option.textContent = element.name;
      document.getElementById("category").appendChild(option);
    });
  })
  .catch((err) => {
    console.log(err);
  });
fetch("http://localhost/tiendamvc/api/providers")
  .then((data) => data.json())
  .then((datos) => {
    datos.forEach((element) => {
      let option = document.createElement("option");
      option.value = element.provider_id;
      option.textContent = element.name;
      document.getElementById("provider").appendChild(option);
    });
  })
  .catch((err) => {
    console.log(err);
  });
document.getElementById("form").onsubmit = function (e) {
  e.preventDefault();
  //alert("enviando datos");
  let product = {
    //crear un objeto con los datos del formulario
    name: document.getElementById("name").value,
    description: document.getElementById("description").value,
    category_id: document.getElementById("category").value,
    provider_id: document.getElementById("provider").value,
    stock: document.getElementById("stock").value,
    price: document.getElementById("price").value,
  };
  console.log(product);

  //ToDo: validar datos del formulario
  fetch("http://localhost/tiendamvc/api/newproduct", {
    method: "POST",
    body: JSON.stringify(product),
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
  })
    .then((data) => data.json())
    .then((data) => {
      showproducts(data);
    });
  function showproducts(datos) {
    let tbody = document.getElementById("products");
    tbody.innerHTML = "";
    datos.forEach((element) => {
      let tr = document.createElement("tr");
      let td = document.createElement("td");
      td.textContent = element.product_id;
      tr.appendChild(td);
      td = document.createElement("td");
      td.textContent = element.name;
      tr.appendChild(td);
      td = document.createElement("td");
      td.textContent = element.description;
      tr.appendChild(td);
      td = document.createElement("td");
      td.textContent = element.category.name;
      tr.appendChild(td);
      td = document.createElement("td");
      td.textContent = element.provider.name;
      tr.appendChild(td);
      td = document.createElement("td");
      td.textContent = element.stock;
      tr.appendChild(td);
      td = document.createElement("td");
      td.textContent = element.price;
      tr.appendChild(td);
      tbody.appendChild(tr);
    });
  }
};
