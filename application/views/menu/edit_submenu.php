<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <?= form_open_multipart('menu/proses_edit_submenu'); ?>
            <div class="form-group">
                <input type="hidden" name="id" value="<?= $subMenu['id']; ?>">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="<?= $subMenu['title']; ?>" required>
                <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class=" form-group">
                <label for="title">Menu</label>
                <select name="menu_id" id="menu_id" class="form-control">
                    <option value="<?= $subMenu['menu_id']; ?>"><?= $subMenu['menu_id']; ?></option>
                    <?php foreach ($menu as $m) : ?>
                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class=" form-group">
                <label for="url">Url</label>
                <input type="text" class="form-control" name="url" value="<?= $subMenu['url']; ?>" required>
                <?= form_error('url', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class=" form-group">
                <label for="icon">Icon</label>
                <input type="text" class="form-control" name="icon" value="<?= $subMenu['icon']; ?>" required>
                <?= form_error('icon', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class=" form-group">
                <label for="is_active">Active <code>Jika aktif isi 1, jika tidak isi 0</code></label>
                <input type="text" class="form-control" name="is_active" value="<?= $subMenu['is_active']; ?>" required>
                <?= form_error('is_active', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
