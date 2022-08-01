

     jQuery(function ($) {


     })

     getTable = "";
     GlobalDatasApi = "";
     BaseTbParam = {
        "processing": true,
        select: true,
              dom: 'Blfrtip',
              lengthMenu: [
                  [5,10, 25, 50, 100,-1],
                  [5,10, 25, 50,100, 'Tous']
              ],
              dom: 'lBfrtip',
              buttons: [
                  { extend: 'pdf', text: '<i class="fas fa-file-pdf fa-1x" aria-hidden="true"> Export PDF</i>' },
                  { extend: 'csv', text: '<i class="fas fa-file-csv fa-1x"> Export CSV</i>' },
                  { extend: 'excel', text: '<i class="fas fa-file-excel" aria-hidden="true"> Export EXCEL</i>' },

              ],
        "language": {
            "url": "../DataTables/fr.json",
        },
        "order": [[1, 'desc']]
     }
     GlobalTablesApi = {
        Activites : {
            moreParam:{
                columns:[
                            {
                                "className": 'details-control',
                                "orderable": false,
                                "data": null,
                                "defaultContent": '',
                                 width:"12px",
                            },
                            {"data": "id"},
                            {"data": "operation"},
                            {"data": "emetteur"},
                            {"data": "destinataire"},
                            {"data": "montant"},
                            {"data": "frais"},
                            {"data": "date"},
                        ],
                    },
                },
         otherTables: {name: $('.DataTable'),
                        param: {

                        },
        }
     }
      //à revoir



     ////
 function getdatas (){
    if(window.getTable!=""){
        window.getTable.destroy()
    }
    tbId = $('.DataTable').attr('id')
    tbParam = Object.assign(window.BaseTbParam,window.GlobalTablesApi[tbId].moreParam)

    window.getTable  = $('#'+tbId).DataTable(tbParam);
    //getTable  = $('.DataTable').DataTable(tbParam);
    var table = window.getTable

loadDataTable(window.getTable,window.tbId);

    ///////////////////////////////////////////////////////////////////////////////////////////////////////
   // var table = $('.DataTable').DataTable(TbParam);
    //table.ajax.url( 'Menu/'+param+'/getApi' ).load();

 }
    $('body').on("click",".btn_filter", function() {
       /* window.GlobalTablesApi.activite.selector.DataTable(window.BaseTbParam).destroy

        table = window.GlobalTablesApi.activite.selector.DataTable(window.BaseTbParam);*/
        //table = $('.DataTable').DataTable(window.BaseTbParam);
        filter(window.getTable , window.GlobalDatasApi.data,"date");
    })

//////////////////////////filter datas ////////////
function filter(table,data,key){

    switch (key) {
        case "date":
            filterData = [];
                    $.each(data,function(key,val){

                var min = new Date($('#date_from').val()).toLocaleDateString('fr-Fr');
                var max = new Date($('#date_to').val()).toLocaleDateString('fr-Fr');
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                    date = data[key].date.split(' ')[0];

                if ( ( min <= date   && date <= max ) )
                {
                   //console.log(min,date,max)
                    //console.log(min<=date)
                    filterData.push(data[key])
                    //return true;
                }
                //return false;

                })
                //console.log(filterData)
                //console.log(data)
               // table.clear().rows.add(data).draw()
                if (filterData.length !=0) {
                    table.clear().rows.add(filterData).draw();
                } else {
                    alert('aucun résultat')
                }


        break;

    default:
        /////
        break;
}

   //table.clear();
   //table.rows.add(data.data);




}

///////////////////////////////////////////
function loadDataTable(table,param){
    url = 'Menu/'+param+'/getApi'
    $.get(url,{},'json')
        .done(function(data){
            GlobalDatasApi = data;
           // console.log(data)
        //table.destroy()

        table.clear().rows.add(data.data).draw()
        })
        .fail(function(jqxhr){
            data = jqxhr.responseJSON
            alert(data = jqxhr.responseJSON)

        })
}

///////////////////////////////////////////

   getdatas();




