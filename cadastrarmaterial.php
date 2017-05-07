<?php
include 'header.php';
?>

 <section class="home container" id="home">
     <!-- <div class="row">
         <div class="col-xs-8 col-xs-offset-2 title" >
               <h3>Tenha o <span class="blue">controle</span> absoluto de seus dependentes</h3>
               <h4>Com Zalt Card você determina <span class="blue"> quanto </span>e <span class="blue">onde</span> eles podem gastar</h4>
         </div>
     </div> -->

     <div class="row">
         <div class="col-sm-6 col-sm-offset-3">
             <h2>Cadastrar Material</h2>
         </div>
     </div>
     <div class="row">
       <div class="col-sm-8 col-sm-offset-2">
             <div class="boxCadastro">
               <br>
               <div class="row">
                   <div class="col-sm-3 col-sm-offset-1">
                       <b>Informações Gerais</b>
                   </div>
               </div>
               <br>
               <div class="row">
                 <div class="col-sm-2 col-sm-offset-1">
                   Material
                   <select class="form-control">
                     <option>Papelão</option>
                     <option>Secundário</option>
                   </select>
                 </div>

                 <div class="col-sm-2 ">
                   Quantidade
                   <input type="text" class="form-control" placeholder="">
                 </div>

                 <div class="col-sm-3 ">
                   Unidade de Medida
                   <select class="form-control">
                     <option>Kilograma</option>
                     <option>Litros</option>
                     <option>Chapas</option>

                   </select>
                 </div>

                 <div class="col-sm-3 ">
                   Data de Recebimento
                   <input type="date" class="form-control" placeholder="">
                 </div>
               </div>

               <br>

               <div class="row">
                   <div class="col-sm-3 col-sm-offset-1">
                       <b>Informações do Produto</b>
                   </div>
               </div>
               <br>
               <div class="row">
                 <div class="col-sm-2 col-sm-offset-1">
                   Fabricante
                   <select class="form-control">
                     <option>F1</option>
                     <option>F2</option>
                   </select>
                 </div>

                 <div class="col-sm-2 ">
                   Código
                   <input type="text" class="form-control" placeholder="">
                 </div>

                 <div class="col-sm-3 ">
                   Lote
                   <input type="text" class="form-control" placeholder="">
                 </div>

                 <div class="col-sm-3 ">
                   ???
                   <input type="date" class="form-control" placeholder="">
                 </div>
               </div>
               <br>

               <div class="row">
                   <div class="col-sm-3 col-sm-offset-1">
                       <b>Informações do Produto</b>
                   </div>
               </div>
               <br>
               <div class="row">
                 <div class="col-sm-2 col-sm-offset-1">
                   Fabricante
                   <select class="form-control">
                     <option>F1</option>
                     <option>F2</option>
                   </select>
                 </div>

                 <div class="col-sm-2 ">
                   Código
                   <input type="text" class="form-control" placeholder="">
                 </div>

                 <div class="col-sm-3 ">
                   Lote
                   <input type="text" class="form-control" placeholder="">
                 </div>

                 <div class="col-sm-3 ">
                   ???
                   <input type="date" class="form-control" placeholder="">
                 </div>
               </div>

               <br>

               <div class="row">
                   <div class="col-sm-4 col-sm-offset-4">
                       <button type="button" class="btn btn-cadastrarMaterial" >Cadastrar</button>
                   </div>
               </div>

             </div>
       </div>
     </div>

 </section>
<?php
include 'footer.php';
?>