"use strict"

const API_URL = "api/comentarios/";

let app = new Vue({
    el: "#app",
    data: {
        titulo: "Comentarios",
        comments: [],
    }
});

let idLibro = document.getElementById('divComments').getAttribute('data-idBook');

async function getComments() {
    try {
        let response = await fetch(API_URL + "/libros/" + idLibro);
        if (response.ok) {
            let promesa = await response.json();
            app.comments = promesa;
        }
    } catch (e) {
        console.log(e);
    }
}

let commentForm = document.querySelector("#formComment");
commentForm.addEventListener('submit', addComment);

async function addComment(e) {
    e.preventDefault();
    let data = new FormData(commentForm);
    let comment = {
        comentario: data.get('comentario'),
        valoracion: data.get('valoracion'),
        bookId: idLibro,
    }

    try {
        let response = await fetch(API_URL, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(comment),
        });

        if (response.ok) {
            console.log("se agrego comentario");
            let comment = await response.json();
            app.comments.push(comment);
        }
    } catch (e) {
        console.log(e)
    }
}

async function deleteComment(idComment) {
    try {
        let response = await fetch(API_URL + idComment, {
            "method": "DELETE"
        });
        if (response.ok) {
            console.log("Comentario eliminado exitosamente");
        }
    } catch (e) {
        console.log(e);
    }
}

getComments();