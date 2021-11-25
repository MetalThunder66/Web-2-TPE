{literal}
    <section id="app">
        
        <h1>{{ titulo }}</h1>
        
        <form id="formComment" action="comentar" method="POST" class="my-4">
            <input type="text-area" name="comment" placeholder="Ingrese un Comentario">
            <input type="number" name="valoration" max="5" placeholder="Ingrese una valoracion"> 
            <input type="submit" value="Comentar" class="btn btn-primary mt-2">
        </form>
        
        <div>      
            <ul id="commentList" class="list-group">
                <li v-for="comment in comments" class="list-group-item d-flex">
                    {{comments.comment}} | {{comments.valoration}}
                    <div class="acciones ms-auto">
                        <a class="btn btn-sm btn-danger" v-bind:data-id="comment.Id">Borrar</a>
                    </div>
                </li>    
            </ul>
        </div>
    </section>
{/literal}

   {* <section id="comments">
     <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
        <div class="card-header">Header</div>
        <div class="card-body">
            <h5 class="card-title">Primary card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
        </div> 
        <ul class="listComments">
        </ul>
    </section>
*}




    