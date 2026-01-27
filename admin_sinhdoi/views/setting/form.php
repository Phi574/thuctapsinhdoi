<h2>⚙️ Cài đặt Website</h2>

<form method="post" enctype="multipart/form-data">

    <label>Logo</label><br>
    <input type="file" name="logo"><br>
    <img src="uploads/<?= $setting['logo'] ?>" height="60"><br><br>

    <label>Tên website</label><br>
    <input type="text" name="site_name" value="<?= $setting['site_name'] ?>"><br><br>

    <label>Màu chủ đạo</label><br>
    <input type="color" name="site_color" value="<?= $setting['site_color'] ?>"><br><br>

    <label>Hotline</label><br>
    <input type="text" name="hotline" value="<?= $setting['hotline'] ?>"><br><br>

    <label>Email</label><br>
    <input type="text" name="email" value="<?= $setting['email'] ?>"><br><br>

    <label>Địa chỉ</label><br>
    <input type="text" name="address" value="<?= $setting['address'] ?>"><br><br>

    <label>SEO Title</label><br>
    <input type="text" name="seo_title" value="<?= $setting['seo_title'] ?>"><br><br>

    <label>SEO Description</label><br>
    <textarea name="seo_description"><?= $setting['seo_description'] ?></textarea><br><br>

    <label>
        <input type="checkbox" name="enable_tuvan"
            <?= $setting['enable_tuvan'] ? 'checked' : '' ?>>
        Bật form tư vấn
    </label><br><br>

    <button type="submit">Lưu cài đặt</button>
</form>
