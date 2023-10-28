/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */
$('.trash_button').click(function(event) {
    event.preventDefault();
    fetch($(this).attr('href'), {
        method: "DELETE",
    }).catch(error => {
        alert('Hubo un problema');
        console.log(error);
    }).finally(function() {
        location.reload();
    });
});
