<div id="content">
    <div class="row">

        <br />

        <div role="alert" class="alert alert-info">
            <strong>Heads up!</strong> Used the form below to calculate the difference between 2 dates.<br />
            Each successful calculation will be added to the table which can serve as a history of calculation.
        </div>

        <div role="alert" class="alert alert-info">
            <p><strong>Heads up!</strong> You can also run the date difference from the command line in the root of the web application by doing the following: <br /><code>bin\cake calcs &lt;startdate&gt; &lt;enddate&gt;</code></p>
            <p>An example running the command can be seen below.<br /><code>bin\cake calcs 2016-01-01 2016-01-21</code></p>
        </div>

        <div role="alert" class="alert alert-warning" style="display: none" id='notify'>

        </div>

        <div class='col-md-12'>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= __('Calculate Date Difference') ?></h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <?= $this->Form->create(NULL, ['id' => 'frmCalc']) ?>
                            <fieldset>
                                <div class='col-md-4'>
                                    <?=
                                    $this->Form->input('start_date', [
                                        'class' => 'form-control datepicker',
                                        'autocomplete' => 'off',
                                        'placeholder' => __('Start Date'),
                                        'label' => FALSE,
                                        'title' => __('Enter start date here')
                                    ]);
                                    ?>
                                </div>
                                <div class='col-md-4'>
                                    <?=
                                    $this->Form->input('end_date', [
                                        'class' => 'form-control datepicker',
                                        'placeholder' => __('End Date'),
                                        'autocomplete' => 'off',
                                        'label' => FALSE,
                                        'title' => __('Enter end date here')
                                    ]);
                                    ?>
                                </div>
                                <div class='col-md-2'>
                                    <?=
                                    $this->Form->input('result', [
                                        'class' => 'form-control',
                                        'placeholder' => __('Result'),
                                        'autocomplete' => 'off',
                                        'readonly',
                                        'label' => FALSE,
                                        'title' => __('The result is displayed here.')
                                    ]);
                                    ?>
                                </div>
                                <?= $this->Form->button(__('Calculate'), ['class' => 'btn btn-success', 'title' => __('Click here to calculate the date difference')]) ?>
                            </fieldset>
                            <?= $this->Form->end() ?>
                        </div>        
                    </div>       
                </div>
            </div>



        </div>            
    </div>


    <div class="row">

        <div class="col-sm-8 blog-main">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Previous Calculations</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered" id="tblResult">
                                <thead>
                                    <tr>
                                        <th><?= __('Start') ?></th>
                                        <th><?= __('End') ?></th>
                                        <th><?= __('Result') ?></th>
                                        <th><?= __('Created') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($calcHistory)) {
                                        foreach ($calcHistory as $c) {
                                            ?>

                                            <tr>
                                                <td><?= $c['start_date'] ?></td>
                                                <td><?= $c['end_date'] ?></td>
                                                <td><?= $c['result'] ?></td>
                                                <td><?= $c['created'] ?></td>
                                            </tr>

                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>    
            </div>

        </div>

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>About</h4>
                <p>This form will calculate the difference between date and the table will will store the result.</p>
                <p>Each successful calculation attempt is store in a SQLite database so if the page is refreshed, the user will be shown the last 10 calculations attempts.</p>

                <h4>Unit Test</h4>
                <p>Unit testing has been concentrated to models and controllers.</p>
                <p>You can view the coverage report by <a href="<?=WEBROOT ?>coverage/index.html" target="_blank">clicking here</a>.</p>
            </div>

            <div class="row">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">Technologies Used</h3>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li>SQLite</li>
                            <li>PHP UnitTest</li>
                            <li>JavaScript/jQuery</li>
                            <li>jQuery UI</li>
                            <li>Ajax</li>
                            <li>Bootstrap</li>
                            <li>CSS</li>
                            <li>HTML5</li>
                        </ul>
                    </div>
                </div>   
            </div>

        </div>

    </div>
</div>

