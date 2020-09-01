<!DOCTYPE html>
<html lang="en">
<head>
    <?= view('_partial/head') ?>
    <script type='text/javascript'
            src='https://platform-api.sharethis.com/js/sharethis.js#property=5ef5b8bdb71a170012eecee8&product=inline-share-buttons&cms=sop'
            async='async'></script>
</head>
<body class="d-flex flex-column min-vh-100">
<?= view('_partial/navbar') ?>
<div class="container">
    <div class="mt-4 mb-4">
        <div class="row">
            <div class="col">
                <img class="card-img-top" src="<?= ($thumbnail_url)? $thumbnail_url : "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAAMFBMVEXMzMz////JycnQ0NDu7u77+/vX19f4+PjOzs7y8vLh4eHc3Nz19fXk5OTe3t7o6OglbxQAAAAEoklEQVR4nO2cjXarKhBGZRBBRXn/t70zA6hp0+hZ96ykHr692kSRWN3yMwpp1wEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB9muAh9+kDfBQ3eXMTbTx/sm7BXjQifPtj3QEkKwCU4Y2qi+tBozEqXWIzpm3EyX8s5NeeEgj1pQptzQslxuzK/Oue2nFBHfe5Y1hcn3ZYTDttqb/tQf0L5zbTlhLRHVh7aW3ow1JaTreoYMx3OmgYzUqPlZD2Uk+GwSSrUuK835WTeI3x/2JLbmH5LaM1Jt6oAtzcgNDhTpITc0LblRBqNofcx2f2cqxKuPiWxMSdSEEh+aotKW+e8S2nLyWFdpYQHJVVKo05KMfmipEhp0wn1+oDkm5LcJTfpRCI3lvJEiaY36CTkYDY9VdKokxrf9w5OqpP+mYp2nXDMRq+VtOekO1XSnhM6qThtOhnhZEefn+grnFTKczY4OVDbE/d6XNQt7TkJpzR6v3PC2pKT5doYemrGyXLWuh6ZmnDS2cvTlIyJbShhKb27SH++s3+DoLMsrhBaKSV/QgjnedoCQgAAAAAAAPgYwUpAXubRE9/GddttXL2xk6Wcac9al/UtbGu2zOzSTHV2/jZLv370Hef1f5jlcbs1RibpBRnW2ibU1wf1nnhp4USvo4E6jzqn5EGO+pbnRY5yxuR5f7SUyUur7L3TDLa+/mpm49iJk6OWwc8x7vNfU+SVGHviDdnJsDnpq5OkG4qTOHqdF0lRHlYu+Tmk7FZ3mf/KLZyYmfLRBj52Of/tiSoFTifqXjkZ1WhxEmQEVTZENr05YbOT7O5OTsbiZJDpwDQcHh9yulaFn504Q/wJV5xY2UmvTlhvcWKdqwv3cWJsPtpZp0gPUpkK6iS8cjIaS5Pz8gUWPVnanIzVCad4dzMn3qXw6GTbuDuZiPhEvztJXB76ONZyIs3xrE5GE7ITmsw6aiN7IycxuXy06wsnY0rJPXGy8nvsq5M+ebYXxAlvmMSJTIEbkjayd3JizSpHSz+Wk23qyRMn3C25adz7Yq/fkotm7n2pO97YSbunOzkhH0/LST/P87P2ZE0+mCEWJyuXCI1Y2MnA1UecWA5wBo1UbuVExvlO2xMJxL47mSYzG3toTxbptsQJZ1cnvD+Jc+7mxKoTetnv8FptYwcNXafshHsVJ+WFtr7Y5XJSx47LwKq9mROJvWp8ogl14/e+OPDll47FbWZkODRu8QlpXCwJYrpXb0sIOcPRyW8e9pjlfibfkXCPzBffH/7jwJP4pEsmBqltXXHi+cxjKSeBrC/xySovUk6cBMeJdxo2Jxwb/+rxQnHS5fhEvlnPuP0SfnUy57Q6fUCdyG/c+x39bx8qiU1LX6w3QKsUvs2J3lh+7pRP0arC11GmGdEanTt+kYuveontRYG2J1wUeufGmWr6wuUgt7E6iJ6kwEnkJgnsJFdFK62M9epEs42/2UmnxbiWZfpSqssa/ZBJFmQ5r+dpOYfPHT71sPj1rwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAH+X/wCj6CmgTH0orQAAAABJRU5ErkJggg=="; ?>" alt="<?= esc($title); ?>">
            </div>
            <div class="col">
                <h3><?= $title; ?></h3>
                <h6>Last updated on: <?= date('l jS \of F Y h:i:s A', $updated_at); ?></h6>
                <div class="container">
                    <?= $description; ?>
                </div>
                <div class="sharethis-inline-share-buttons"></div>
                <div class="text-center mt-2 mb-2">
                    <a class="btn btn-primary btn-lg" href="<?= ($document_upload_id)? base_url("document/download/${document_upload_id}") : $url; ?>" role="button">Download</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= view('_partial/footer') ?>
<?= view('_partial/body_end') ?>
</body>
</html>