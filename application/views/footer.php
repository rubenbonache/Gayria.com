      </div>

    </div> <!-- END Box Wrapper -->

  <!-- END Slot Machine Tabs -->
                </div>
            </div>
      </div>
                    
      </section>
      <!-- Aside -->
      <aside>
          
          <div class="container_12">
              <div class="wrapper">
                  <div class="grid_3">
                      <h6 class="head-2">
                          Redes Sociales
                      </h6>
                      <ul class="list-2">
                          <li><a href="#">Twitter</a></li>
                          <li><a href="#">Facebook</a></li>
                          <li><a href="#">Tuenti</a></li>
                            
                      </ul>
                  </div>
                  <div class="grid_6">
                      <h6 class="head-2">
                          Links Rapidos</h6>
                      <div class="wrapper">
                          <div class="grid_3 alpha">
                              <ul class="list-2">
                                  <li><a href="#">Reg&iacute;strate</a></li>
                                  <li><a href="#">Buscar usuarios normales</a></li>
                                  <li><a href="#">Servicios profesionales</a></li>
                                  <li><a href="#">Videos por SMS</a></li>
                              </ul>
                          </div>
                          <div class="grid_3 omega">
                              <ul class="list-2">
                                  <li><a href="#">Webcam online</a></li>
                                  <li><a href="#">Mi perfil</a></li>
                                  <li><a href="#">Contacto</a></li>
                                  <li><a href="#">Ayuda sobre el funcionamiento</a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <div class="grid_3">
                      <h6 class="head-2">
                          Suscribete a nuestro bolet&iacute;n</h6>
                      <form method="get" id="newsletter">
                     
                          <p>
                            <input type="text" name="newslttr">
                            </p>
                          <p><a onClick="document.getElementById('newsletter').submit()" class="button-1">subscribete</a></p>
                      </form>
                  </div>
            </div>
          </div>
      </aside>
    </div>
    </div>
    <!-- Footer -->
    <footer>
        Gayria.com &copy; <?=mdate('%Y', time())?>  <a href="index-7.html">Politica de privacidad</a>
        <div class="fright"><?=anchor('settings/lang/ES/'.$this->uri->slash_segment(1).$this->uri->slash_segment(2).$this->uri->slash_segment(3), 'ES')?> - <?=anchor('settings/lang/EN/'.$this->uri->slash_segment(1).$this->uri->slash_segment(2).$this->uri->slash_segment(3), 'EN')?> </div>
    </footer>

</body>
</html>