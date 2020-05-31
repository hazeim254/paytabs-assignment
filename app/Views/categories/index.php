<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-8 offset-sm-2 py-4">
            <section id="categoryContainer">
                <article class="form-group py-2">
                    <label for="" class="control-label">Category</label>
                    <select name="category" class="form-control custom-select category mb-4" id="">
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id'] ?>"><?= esc($category['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </article>
            </section>
        </div>
    </div>
</div>

<script type="text/html" id="template">
    <article class="form-group py-2">
        <label for="" class="control-label">Category</label>
        <select name="category" class="form-control custom-select category mb-4" id="">
            <option value="">Select Category</option>
        </select>
    </article>
</script>

<script src="https://code.jquery.com/jquery.min.js"></script>
<script>
    $(function() {
        const container = $('#categoryContainer');
        const template = $('#template').html();

        container.on('change', 'select', function() {
            let value = $(this).val();
            $.ajax({
                url: `/categories/ajax/${value}`,
                dataType: 'json',
                cache: true
            }).success(response => {
                $(this).parent().find('.form-group').remove();
                if (response.length) {
                    const element = $(template);
                    const select = element.find('select');

                    response.forEach(category => {
                        select.append(`<option value="${category.id}">${category.name}</option>`);
                    });

                    $(this).parent().append(element);
                }
            });
        });
    })
</script>

</body>
</html>