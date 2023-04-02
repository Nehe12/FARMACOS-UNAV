            // const table_Interaccion = document.getElementById('interacciones');
            // const modal_interaccion = document.getElementById('editarInter');
            // const inputs= document.querySelectorAll('input');

            // table_Interaccion.addEventListener('click',(e)=>{
            //   e.stopPropagation();
            //   const data =e.target.parentElement.parentElement.children;
            //   fillData(data);
            // })

            // const fillData =(data)=>{
            //   for(let index of inputs){
            //     console.log(index);
            //   }
            // }


            $(document).ready(function () {
               $(document).on('click','#bt-modal',function () {
                 var id_In = $(this).data('id_inter');
                 var interaccion = $(this).data('inter');
                 var id_farmaco = $(this).data('id_far');


                 $("#id_interaccion").val(id_In);
                 $("#inter").val(interaccion);
                 $("#id_farmaco").val(id_farmaco);
               });
            });

           $(document).ready(function () {
            $('#farmaco').DataTable({
              "lengthMenu":[[5,10,50,100,-1],[5,10,50,100,"All"]]
              });
            });

            $(document).ready(function () {
            $('#tabla_interacciones').DataTable({
              "lengthMenu":[[8,15],[8,15,"All"]]
              });
            });


