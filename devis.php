<?php 
    require 'header.php';
    
    $pack='';
    if(isset($_REQUEST['pack'])){
        $pack=$_REQUEST['pack'];
    }
    $pack=strtoupper($pack);

?>
   <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">Demande de devis</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="/">Acceuil</a></li>
            <li class="breadcrumb-item active">Demande-de-devis</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
 <div id="content">
        <div class="container">
          <section class="bar">
                <div class="row">
                 <div class="col-lg-12" id="msg"></div>
                  <div class="col-md-8 mx-auto">
                    <form>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="lastname">Nom</label>
                            <input id="lastname" placeholder="Veuiller entrer votre nom" type="text" class="form-control">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="firstname">Prénom</label>
                            <input id="firstname" placeholder="Veuiller entrer votre prénom" type="text" class="form-control">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" placeholder="Veuiller entrer votre email" type="text" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="telephone">Téléphone</label>
                              <input id="telephone" name="telephone" type="text" class="form-control" placeholder="Veuiller entrer le numéro de téléphone">
                            </div>
                          </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="subject">Packs</label>
                            <select class="form-control" name="packs" id="packs" required>
                                <option value="PERSONNE PHYSIQUE" <?php echo ($pack=="PERSONNE PHYSIQUE") ? 'selected' : '' ?>>PERSONNE PHYSIQUE</option>
                                <option value="PERSONNE PHYSIQUE" <?php echo ($pack=="PACK PRESTIGE") ? 'selected' : '' ?>>PACK PRESTIGE</option>
                                <option value="PERSONNE PHYSIQUE" <?php echo ($pack=="PACK PROFESSIONNEL") ? 'selected' : '' ?>>PACK PROFESSIONNEL</option>
                                <option value="PERSONNE PHYSIQUE" <?php echo ($pack=="PACK MOKAWIL") ? 'selected' : '' ?>>PACK MOKAWIL</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" class="form-control"></textarea>
                          </div>
                        </div>
                        <div class="col-sm-12 text-center">
                          <button type="submit" class="btn btn-template-outlined btn-send"><i class="fa fa-send"></i> Envoyer</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
          </section>
        </div>
      </div>


<?php require 'footer.php'; ?>

<script>
    $(document).ready(function(){
        $('#navigation .nav-item a').attr('href',"serviap.ma");
        $('#navigation .nav-item').removeClass('active');
        
         $('.btn-send').click(function(){
        var fname=$('#firstname').val();
        var lname=$('#lastname').val();
        var email=$('#email').val();
        var telephone=$('#telephone').val();
        var pack=$('#packs').val();
        var message=$('#message').val();

        $.ajax({
                url:"backend.php",
                type:"post",
                dataType:"json",
                async:false,
                data:{action:"devis",firstname:fname,lastname:lname,email:email,telephone:telephone,pack:pack,message:message},
                success:function(data){
                   if(data.status=="passed"){
                      $('#msg').html('<div class="alert alert-success" role="alert">Votre message a été envoyé avec success</div>');
                    $('#firstname').val('');
                    $('#lastname').val('');
                    $('#telephone').val('');
                    $('#email').val('');
                    $('#message').val('');
                   }else{
                      $('#msg').html('<div class="alert alert-danger" role="alert">Message echoé</div>');
                   }
                },
                error:function(error){
                  alert(error);
                }
            })
            return false;
        })
    })
</script>