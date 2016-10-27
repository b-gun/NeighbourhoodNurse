
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                            <?= $this->Form->create() ?>
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
<!--                        <form role="form">-->
                            <fieldset>
                                <?= $this->Form->create() ?>
                                <div class="form-group">
                                    <?= $this->Form->input('username',array( 'class'=>'form-control', 'placeholder'=>'Username','type'=>"text",'autofocus')) ?>
                                    <?= $this->Form->input('password',array( 'class'=>'form-control', 'placeholder'=>'Password','type'=>"password",'value'=>"")) ?>
                                </div>
                                
<!--                                 Change this to a button or input when using this as a form -->
                                <?= $this->Form->button('Login',array('class'=>'btn btn-lg btn-success btn-block')) ?>
                                <?= $this->Form->end() ?>
                            </fieldset>
<!--                        </form>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
