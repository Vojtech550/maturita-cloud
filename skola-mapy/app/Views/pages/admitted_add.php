<div class="row">
    <div class="col-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Počet přijatých na škole<a href="<?= base_url() ?>" class="btn btn-danger float-right">Back</a></h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('Pages/admitted_add') ?>" method="POST">
                <div class="row">
                    <div class="col-12 col-md-6 col-sm-12">
                        <label>Vyberte školu:</label>
                        <select name="skola" class="form-control">
                            <?php
                            foreach($select_skola as $row)
                            {
                                echo '<option value="'.$row->id.'">'.$row->nazev.'</option>';
                            }
                            ?>
                            </select> 
                    </div>
                    
                    <div class="col-12 col-md-6 col-sm-12">
                        <label>Vyberte obor:</label>
                        <select name="obor" class="form-control">
                            <?php
                            foreach($select_obor as $row)
                            {
                                echo '<option value="'.$row->obor.'">'.$row->nazev.'</option>';
                            }
                            ?>
                            </select>
                    </div>

                    <div class="col-12 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label>Počet přijatých:</label>
                            <input type="text" name="pocet" class="form-control" placeholder="Zadejte zeměpisnou šířku">
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label>Zadejte ročník</label>
                            <input type="text" name="rok" class="form-control" placeholder="Zadejte zeměpisnou šířku">
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="form-group">
                            <button type="submit" class=" col-12 btn btn-primary btn-lg">Uložit</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>