<!-- Modal -->
<div class="modal fade" id="insertData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./db/check.php" method="post">
                    <div class="ms-2">
                        <!-- one rows -->
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" required name="description" id="form10Example1" class="form-control" placeholder="Description" />
                                </div>
                            </div>
                        </div>
                        <!-- two rows -->
                        <div class="row g-3 mt-2">
                            <div class="col-sm-6">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="number" required name="income" id="form10Example2" class="form-control" placeholder="Income" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="number" required name="expenses" id="form10Example3" class="form-control" placeholder="Expenses" />
                                    <br>
                                </div>
                            </div>
                        </div>
                        <!-- three rows -->
                        <div class="row g-3 mb-2">
                            <div class="col-sm-12">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="date" required name="date" id="form10Example1" class="form-control" placeholder="Date" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="text" name="user_id" value=<?= $_SESSION['username_id'] ?> hidden>
                    <div class="text-end d-flex justify-content-end">
                        <button type="submit" name="insert" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>