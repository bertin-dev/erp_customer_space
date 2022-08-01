
function ConfirmTransactionCc (){
    $("body").on('submit','.transactionCc',function(e){
        /// e.preventDefault();

           e.preventDefault(); //prevent the default action
   form = $(this)
      // ouverture de la modal de confirmation
      noCompte = form.find("#account_recever").val();
      amount = form.find("#amount").val();
      console.log(amount)

      $('#modalConfirm').slideDown().find('.amoutTransact').text(amount)
      $('#modalConfirm').find('.nocompte').text(noCompte)

       })

    $('.btn-confirm').on('click',function(){
        $('.loader-toast').removeClass('hide').addClass('show')

        //form = $(".transactionCc");
        data = form.serializeArray();
        url = "Menu/Payements/PeerToPeerTransaction";
        $.post(url,data).fail(function(jqxhr){
            //console.log(jqxhr)
            data = jqxhr.responseJSON
        //  console.log(data)
            $('.loader-toast').removeClass('show').addClass('hide',
                notify('error','ERROR',data.message)
            )
            if(data.data != undefined){
                $.each(data.data,function(key,val){
                    form.find('label[for = '+key+']').text(val).css({"color": "red"})
                })

            }


        }).done(function(data){

            //  data = JSON.parse(data);


            if(data.success){

                $('.loader-toast').removeClass('show').addClass('hide',
                            notify('success','coool',data.message.notif)

                        )

                $('.transactionCc').trigger("reset")

                // ajout des données de transaction
               $('#confirmation').slideToggle().find('.modal-body').text(data.message.compte_receiver.notif)

                content = '<tr><th scope="row">'+data.data.transaction_number+'</th>\
                <td>'+data.data.transaction_type+'</td>\
                <td>'+data.message.sender.account_number+'</td>\
                <td>'+data.message.compte_receiver.account_number+'</td>\
                <td>'+data.data.amount+'</td>\
                <td>'+data.data.state+'</td></tr>'
               $('.table-result-state tbody').prepend(content).fadeIn(700)
            }else{
                $('.loader-toast').removeClass('show').addClass('hide',
                notify('error','ERROR',data.message)
            )

            }

        })

        $('#modalConfirm').slideUp()
    })
}

function changeActive(elt =null){

    var tabsNewAnim = $('#navbarSupportedContent');
    var selectorNewAnim = $('#navbarSupportedContent').find('li').length;
    var activeItemNewAnim = tabsNewAnim.find('.active');
    var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
    var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
    var itemPosNewAnimTop = activeItemNewAnim.position();
    var itemPosNewAnimLeft = activeItemNewAnim.position();
    /*$(".hori-selector").css({
      "top":itemPosNewAnimTop.top + "px",
      "left":itemPosNewAnimLeft.left + "px",
      "height": activeWidthNewAnimHeight + "px",
      "width": activeWidthNewAnimWidth + "px"
    });*/
    if(elt != null){
        $('#navbarSupportedContent ul li').removeClass("active");
        elt.addClass('active');
        //console.log(elt)
        var activeWidthNewAnimHeight = elt.innerHeight();
        var activeWidthNewAnimWidth = elt.innerWidth();
        var itemPosNewAnimTop = elt.position();
        var itemPosNewAnimLeft = elt.position();
        $(".hori-selector").css({
            "top":itemPosNewAnimTop.top + "px",
            "left":itemPosNewAnimLeft.left + "px",
            "height": activeWidthNewAnimHeight + "px",
            "width": activeWidthNewAnimWidth + "px"
        });

    }
        $("#navbarSupportedContent").on("click","li",function(e){

        $('#navbarSupportedContent ul li').removeClass("active");
        $(this).addClass('active');
        var activeWidthNewAnimHeight = $(this).innerHeight();
        var activeWidthNewAnimWidth = $(this).innerWidth();
        var itemPosNewAnimTop = $(this).position();
        var itemPosNewAnimLeft = $(this).position();
        $(".hori-selector").css({
            "top":itemPosNewAnimTop.top + "px",
            "left":itemPosNewAnimLeft.left + "px",
            "height": activeWidthNewAnimHeight + "px",
            "width": activeWidthNewAnimWidth + "px",

        });
        });


  }

  /*$(document).ready(function(){
    setTimeout(function(){ changeActive(); });
  });*/
  $(window).on('resize', function(){
    setTimeout(function(){ changeActive(); }, 500);

  });
  $(".navbar-toggler").on('click',function(){
    setTimeout(function(){ changeActive(); });
  });

  function loadMainContent(loader ,link,willGetContent = null){
    loader.find(".fieldMessage").hide()
    loader.find(".fieldLoading").show()
    loader.fadeIn()
       return new Promise((resolve,reject) =>{
          willGetContent == null ? content =  $('main'): content = willGetContent;

       content.load(link,"",function(data, statusTxt, xhr){

        if(statusTxt == "success"){
            //close loader
            try {
                data = JSON.parse(data);
                test = true;

            } catch (e) {
                test = false;
            }
            if(test && data.status =="disconnected"){
                //alert()
                window.location.href = "/Login"
            }

            loader.fadeOut()
            resolve();
        }

        if(statusTxt == "error"){
            // show error message and close loader
           msg = "Error: " + xhr.status + ": " + xhr.statusText
           loader.find(".fieldLoading").fadeOut()
           loader.find(".fieldMessage").html(msg).css({'color':"red"}).show().parent().delay(3000).slideUp();
            reject();
       }

    })


         // alert("External content loaded successfully!");


     })
}

$(window).on('load', function() {
    setTimeout(function(){
        words = window.location.pathname.split("/");
       // console.log($("."+words[words.length-1]).parent())
       if(words[words.length-1].trim() !="" && $("."+words[words.length-1]).length !=0){
           changeActive(elt = $("."+words[words.length-1]).parent());
       }else{
        changeActive(elt = $(".Recapitulatifs").parent());
       }



        if( window.location.pathname == "/"){
            elt  = $('.modalLoader')

            loadMainContent(elt,'Menu/Recapitulatifs')
            document.title = 'Recapitulatifs'
           }else{
            document.title = words[words.length-1]
           }

    });

   })


$(".headerNavBar .nav-item a").on("click",function(e){

    e.preventDefault();


    link =  $(this).attr("href")

    elt  = $('.modalLoader')

    if(link == "/Deconnexion"){
        document.location.href = link;
    }else{
        link =  "Menu"+$(this).attr("href")

   // $(".headerNavBar .active").removeClass("active");

   /* if ($(this).hasClass("dropdown-item")) {
        $(this).parent().parent().addClass("isactive");
        $(this).addClass("isactive");
    } else {
        $(this).parent().addClass("isactive");
    }*/


      /// call loadMainContent

  //loadMainContent(elt,link)
   // reecriture de l'URL

  words = link.split('/')
 window.history.pushState("","Title" , words[words.length-1]);

  loadMainContent(elt,link)
  document.title = words[words.length-1]

  //self.frames['test'].location.href = '';
}
})

$(window).on('load', function(){
    setTimeout(function(){



    })

    $('body').on('click','.isLink', function(e){
        e.preventDefault();

        elt  = $('.modalLoader')
         link = $(this).attr("href");

        link =  "Menu"+link
        words = link.split('/')

        if($(this).hasClass('noMenu')){
            loadMainContent(elt,link)
            document.title = words[words.length-1]
            window.history.pushState("","Title" , words[words.length-1]);
        }else{
            loadMainContent(elt,link).then(function(){
            //$('.navbar a').removeClass('active');
            //$("."+words[1]).addClass('active')

            changeActive(elt = $("."+words[1]).parent());

             })
        }


    })

  $('body').on("click", '.filter-list',function(e){
      $('.second-content').fadeOut()
      $('.content-filter').fadeIn()

  })

  $('body').on("click", '.filter-back',function(e){
      e.preventDefault();
    $('.content-filter').fadeOut()
    $('.second-content').fadeIn()

    })


  });
/* run subMenu */


$('body').on('click',".list-group .link", function(e){
    e.preventDefault();

    $this = $(this),
    $('.accordion .open').removeClass('open')
    $this.parent().addClass('open');
    $next = $this.next();
    if($next.length !=0){
        $next.slideToggle();
    }
$('.accordion').find('.submenu').not($next).slideUp().parent().removeClass('open');

})
// gestion des menu gauche des rapports
/*$(window).on('popstate', function(event) {
    window.history.go(-1);
   });
   $(window).on('pushstate', function(event) {
    window.history.go(1);
});*/
$('body').on('click','.btn-rapport',function(){
    title = $(this).attr('link')
    link = "Rapports/"+title

    //window.history.replaceState("","Title" , link);
    elt  = $('.modalLoader')
    document.title = title

  loadMainContent(elt,link, willGetContent =  $('.rapport-content'))

   // alert(link)
})

// gestion des btn et des contenus des transactions
 $('body').on('click','.btn-transac',function(){
     link = $(this).find('a').first().attr('href')

     alert(link)
 })

 $('body').on('click','.Rapports-view .submenu a',  function(e){
     $('.Rapports-view a').removeClass('active')
     e.preventDefault();
     elt = $(this);
     link = "Rapports/"+elt.attr("href");
     elt.addClass('active');

     elt  = $('.modalLoader')
    document.title = title

  loadMainContent(elt,link, willGetContent =  $('.rapport-content'))
 })

 /** gestion du Register */

 /*$('body').on('click','.register .nav-item',function(){
     elt = $(this)
     $(".register .nav-link, .register .fade").removeClass("active").
 })*/
 $("body").on('click','#btn-login, #btn-Register', function(e){
     elt = $(this)
     link = $(this).attr('link')
     window.location.href = link
 })

 function delay(callback, ms) {
    var timer = 0;
    return function() {
      var context = this, args = arguments;
      clearTimeout(timer);
      timer = setTimeout(function () {
        callback.apply(context, args);
      }, ms || 0);
    };
  }


  // Example usage:

 $("body").on('keyup','.text-search', delay(function (e) {
   $('.list-search').fadeIn()
        alert("ajax load")
      }, 500)
    )



    ///////////////////////////////////////////////////////////////
    /////////////// gestion des formulaires //////////////////////
    /////////////////////////////////////////////////////////////
      $("body").on('submit', ".formRegisterParticulier", function(e){
         // alert()
        e.preventDefault();
        $('.loader-toast').removeClass('hide').addClass('show')
        form = $(this)
        url = 'https://smp1020.webservice.api.domaine.test.ezpass.smopaye.fr/public/api/autoregister'
        //url = form.attr('action')
        form.ajaxSubmit({
            url: url,
            type: 'post',
            success: function(data){
                //data = JSON.parse(data);

                if(data.success){

                    $('.loader-toast').removeClass('show').addClass('hide',
                                notify('success','coool',data.message)

                            )

                    setTimeout(function(){return window.location.href = '/';}, 2000)

                }else{
                    $('.loader-toast').removeClass('show').addClass('hide',
                    notify('error','ERROR',data.message)
                )
                /*if(data.data != undefined){
                    $.each(data.data,function(key,val){
                        form.find('label[for = '+key+']').text(val).css({"color": "red"})
                    })
                   }*/

                }

            },
            error: function(jqxhr){
                data = data = jqxhr.responseJSON
                $('.loader-toast').removeClass('show').addClass('hide',
                notify('error','ERROR',data.message))
            }
        })

      })




  $('body').on('submit','.form_login, .form', function(e){
   /* $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });*/

      e.preventDefault();
      $('.loader-toast').removeClass('hide').addClass('show')
        form = $(this)
        form.find('.forError').text('')
        data = $(form).serializeArray()
        url = form.attr('action')
        $.post(url,data).fail(function(jqxhr){
            //console.log(jqxhr)
            data = jqxhr.responseJSON
          //  console.log(data)
            $('.loader-toast').removeClass('show').addClass('hide',
                notify('error','ERROR',data.message)
            )
            if(data.data != undefined){
                $.each(data.data,function(key,val){
                    form.find('label[for = '+key+']').text(val).css({"color": "red"})
                })

            }


        }).done(function(data){

                data = JSON.parse(data);

            if(data.access_token != undefined){
                data.message ="Vous êtes connecté"
                $('.loader-toast').removeClass('show').addClass('hide',
                            notify('success','coool',data.message)

                        )

                setTimeout(function(){return window.location.href = '/Recapitulatifs';}, 2000)

            }else{
                $('.loader-toast').removeClass('show').addClass('hide',
                notify('error','ERROR',data.message)
            )
            if(data.data != undefined){
                $.each(data.data,function(key,val){
                    form.find('label[for = '+key+']').text(val).css({"color": "red"})
                })

            }
            }

        })

  })

  ///// TransactionCC //////

  ConfirmTransactionCc()
    /////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////
    //////////////

/////
$(document).ready(function() {

    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload").on('change', function(){
        readURL(this);
    });

});

