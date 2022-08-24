

<div class="col-md-12">	
  <div class="row">
    <h3 class="mt-5 dissplay-4 text-center">Tutti gli ordini</h3>
    <h4 class="bg-success"><?php mostraAvviso();?></h4>
    </div>
    <div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>N. Ordine</th>
                <th>Importo</th>
                <th>Status</th>
                <th>Valuta</th>
            </tr>
        </thead>
        <tbody>
            <?php ordini(); ?>
            <!-- <tr>
                <td scope="row">20</td>
                <td>12345</td>
                <td>€ 1.500</td>
                <td>ComplitednumOrdine</td>
                <td>$</td>
                <td>
                    <a class="btn btn-danger" href="#" role="button">Cancella</a>
                </td>
            </tr> -->
        </tbody>
    </table>
   </div>
</div>