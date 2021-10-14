<script>
    $(document).ready(function(){
        $("#videoModal").modal('show');
    });
</script>

<!--=====================================
=            Modal de inicio video      =
======================================-->
<body>
    <div id="videoModal" class="modal" role="dialog" tabindex="-1" aria-labelledby="myModalLabel">
        <div class="modal-dialog" style="width:50%;" >
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" muted data-dismiss="modal">&times;</button>
                  <center><h1 class="modal-title">Bienvenido</h1></center>
              </div>
              <form >
                <link href="layout/styles/CSS/style.css" rel="stylesheet" >
                <div class="form-group">
                    <center><iframe name="video" id="video" src="https://www.youtube.com/embed/16y1AkoZkmQ?autoplay=1" width="100%;" height="450" allowfullscreen=""></iframe></center>
                </div>
                <div class="form-group">
                    <h3 style="font-size:16px; font-weight:bold; margin-bottom:2em; text-align:center; color:#520303;">Menú de opciones de videos informativos</h3>
                    
                    <center>

                        <select id="opciones" name="name" onchange="video.location.href=this.options[this.selectedIndex].value">

                            <option value="https://www.youtube.com/embed/16y1AkoZkmQ?feature=player_detailpage&amp;autoplay=1">

                                Inicio

                            </option>

                            <option value="https://www.youtube.com/embed/iIEksxk_4-4?feature=player_detailpage&amp;autoplay=1">

                                Introducción

                            </option>

                            <option  value="https://www.youtube.com/embed/CK0nPlaSvUI?feature=player_detailpage&amp;autoplay=1">

                                Final

                            </option>

                        </select>
                        
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<!--====  End of Section comment  ====-->

