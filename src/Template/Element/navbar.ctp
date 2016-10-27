<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">          
            <div class="navbar-header">
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>            
            <a class="navbar-brand">Neighbourhood Nurse</a>
            </div>            
         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">                    
                    <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Visits
                       
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                       
                            <a href="#">
                                <div>
                                     <i><?= $this->Html->link(__('View Visits'), ['controller' => 'Visits','action' => 'index']) ?>
                                     </i>
                                </div>
                            </a>                       
                        <li class="divider">
                        </li>                    
                            <a href="#">
                                <div>
                                    <i><?= $this->Html->link(__('Add Visits'), ['controller' => 'Visits','action' => 'add']) ?>
                                     </i>
                                </div>
                            </a>
                </ul>
                </li>
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Patients 
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">                       
                            <a href="#">
                                <div>
                                     <i><?= $this->Html->link(__('View Patients'), ['controller' => 'Patients','action' => 'index']) ?>
                                     </i>
                                </div>
                            </a>                       
                        <li class="divider"></li>
                        
                            <a href="#">
                                <div>
                                    <i><?= $this->Html->link(__('Add Patients'), ['controller' => 'Patients','action' => 'add']) ?>
                                     </i>
                                </div>
                            </a>                   
                </ul>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Referrers
                       
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                       
                            <a href="#">
                                <div>
                                     <i><?= $this->Html->link(__('View Referrers'), ['controller' => 'Referrers','action' => 'index']) ?>
                                     </i>
                                </div>
                            </a>                       
                </li>
                <li class="divider"></li>
                        
                            <a href="#">
                                <div>
                                    <i><?= $this->Html->link(__('Add Referrers'), ['controller' => 'Referrers','action' => 'add']) ?>
                                     </i>
                                </div>
                            </a>                    
                </li>
                </li>
             </ul>
              <li class="dropdown">
                                 <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Categories

                                 </a>
                                 <ul class="dropdown-menu dropdown-alerts">

                                         <a href="#">
                                             <div>
                                                  <i><?= $this->Html->link(__('View Categories'), ['controller' => 'Categories','action' => 'index']) ?>
                                                  </i>
                                             </div>
                                         </a>
                             </li>
                             <li class="divider"></li>

                                         <a href="#">
                                             <div>
                                                 <i><?= $this->Html->link(__('Add Categories'), ['controller' => 'Categories','action' => 'add']) ?>
                                                  </i>
                                             </div>
                                         </a>
                             </li>
                             </li>
                          </ul>
                           <li class="dropdown">
                                              <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Diseases

                                              </a>
                                              <ul class="dropdown-menu dropdown-alerts">

                                                      <a href="#">
                                                          <div>
                                                               <i><?= $this->Html->link(__('View Diseases'), ['controller' => 'Diseases','action' => 'index']) ?>
                                                               </i>
                                                          </div>
                                                      </a>
                                          </li>
                                          <li class="divider"></li>

                                                      <a href="#">
                                                          <div>
                                                              <i><?= $this->Html->link(__('Add Diseases'), ['controller' => 'Diseases','action' => 'add']) ?>
                                                               </i>
                                                          </div>
                                                      </a>
                                          </li>
                                          </li>
                                       </ul>
            </div>
    </div>
</nav>