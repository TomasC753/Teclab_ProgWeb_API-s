/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

class Query {
  static baseURL = 'http://127.0.0.1:5500/backend/';
  static get(params) {
    alert('hola mundo')
  }
}

document.addEventListener('DOMContentLoaded', function () {
  // código
  document.querySelector('.save_button').addEventListener('click', (event) => {
    event.preventDefault();
    Query.get();
  });
});