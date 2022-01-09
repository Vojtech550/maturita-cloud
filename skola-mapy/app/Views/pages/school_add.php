<div class="row">
    <div class="col-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Přidej školu<a href="<?= base_url() ?>" class="btn btn-danger float-right">Back</a></h4>
            </div>

            <div class="card-body">
                <form action="<?= base_url('Pages/school_add') ?>" method="POST">
                <div class="row">
                    <div class="col-12 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label>Název školy</label>
                            <input type="text" name="nazev" class="form-control" placeholder="Zadejte název školy">
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-6 col-sm-12">
                        <label>Vyberte obec:</label>
                        <select name="mesto" class="form-control">
                            <?php
                            foreach($select_mesto as $row)
                            {
                                echo '<option value="'.$row->mesto.'">'.$row->nazev.'</option>';
                            }
                            ?>
                            </select>
                    </div>

                    <div class="col-12 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label>Geo_lattitude</label>
                            <input type="text" name="geo_lat" class="form-control" placeholder="Zadejte zeměpisnou šířku">
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label>Geo_longtitude</label>
                            <input type="text" name="geo_long" class="form-control" placeholder="Zadejte zeměpisnou délku">
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