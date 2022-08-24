<h3 class="mt-5">Tutti i prodotti</h3>
<h4 class="bg-success"><?php mostraAvviso(); ?></h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Immagine</th>            
            <th>Categoria</th>
            <th>Prezzo</th>
            <th>Magazzino</th>
        </tr>
    </thead>
    <tbody>
<?php prodottiAdmin(); ?>

<!--         <tr>
            <td>20</td>
            <td>Mandarini</td>            
            <td>
                <img src="" alt="">
            </td>
            <td>Frutta esotica</td>
            <td>€ 23</td>
            <td>500</td>
        </tr> -->
    </tbody>
</table>