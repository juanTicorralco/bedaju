<div class="ps-breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="<?php echo $path.$producter->url_category; ?>"><?php echo $producter->name_category; ?></a></li>
            <li><a href="<?php echo $path.$producter->url_subcategory; ?>"><?php echo $producter->name_subcategory; ?></a></li>
            <li><a href="<?php echo $path.$workerter->url_worker; ?>"><?php echo $workerter->displayname_user; ?></a></li>
            <li><?php echo $producter->name_job; ?></li>
        </ul>
    </div>
</div>