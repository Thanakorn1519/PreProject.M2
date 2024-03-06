<!-- Modal -->
<div class="modal fade" id="edit_<?= $data['ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: black;">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./db/check.php" method="post">
                    <?php $data = showData($data['ID']); ?>
                    <div class="ms-2">
                        <!-- one rows -->
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" required name="description" value="<?= $data["Description"] ?>" id="form10Example1" class="form-control" placeholder="Description" />
                                </div>
                            </div>
                        </div>
                        <!-- two rows -->
                        <div class="row g-3 mt-2">
                            <div class="col-sm-6">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="number" value="<?= $data["Income"] ?>" required name="income" id="form10Example2" class="form-control" placeholder="Income" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="number" value="<?= $data["Expenses"] ?>" required name="expenses" id="form10Example3" class="form-control" placeholder="Expenses" />
                                    <br>

                                </div>
                            </div>
                        </div>
                        <!-- three rows -->
                        <div class="row g-3 mb-2">
                            <div class="col-sm-12">
                                <div data-mdb-input-init class="form-outline">

                                    <input class=" form-control" type="date" value="<?= $data["Date"] ?>" name="date" id="form10Example1" placeholder="Date" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="text" name="ledgerid_id" value=<?= $data['ID'] ?> hidden>
                    <div class="text-end d-flex justify-content-end">
                        <button type="submit" name="delete" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>