<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Frequently Asked Questions (FAQ)</h2>
    <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true" aria-controls="faq1">
                    Bagaimana cara melakukan pembelian?
                </button>
            </h2>
            <div id="faq1" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Pilih produk yang ingin dibeli, lalu klik tombol "Beli". Produk akan otomatis masuk ke keranjang.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                    Apakah saya harus login untuk berbelanja?
                </button>
            </h2>
            <div id="faq2" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Ya, Anda harus login terlebih dahulu sebelum melakukan pembelian.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                    Bagaimana jika saya lupa password?
                </button>
            </h2>
            <div id="faq3" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Silakan hubungi admin untuk reset password Anda.
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
