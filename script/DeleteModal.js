
window.addEventListener("DOMContentLoaded", () => {

    

    let modal = document.querySelectorAll(".modal");
    let btn = document.querySelectorAll(".openModal");
    let btnclose = document.querySelectorAll(".cancel");


for (let i = 0 ; i <= modal.length ; i++) {

        btn[i].addEventListener("click", () => {
            modal[i].style.display = "block";
        });

        function hideModal(id) {
            document.getElementById('modal'+id).style.display = "none";
        }

        window.onclick = function(event) {
            let id = event.target.getAttribute('data-id');
            if (id) {
                hideModal(id);
            }
        };

        btnclose[i].addEventListener("click", (event) => {
            let id = event.target.getAttribute('data-id');
            if (id) {
                hideModal(id);
            }
        });
    }
})
