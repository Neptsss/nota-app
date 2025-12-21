document.addEventListener('DOMContentLoaded', () => {
    const mata_uang = document.querySelector('select[name="mata_uang"]')
    const rateInput = document.querySelector('input[name="rate"]')
    const jumlahInput = document.querySelector('input[name="jumlah"]')
    const jumlahRp = document.querySelector('input[name="jumlah_rp"]')

    if (mata_uang) {
        mata_uang.addEventListener('change', (e) => {
            getCurrency(e.target.value)
        })
    }

    if (rateInput) rateInput.addEventListener('input', handleInput)
    if (jumlahInput) jumlahInput.addEventListener('input', handleInput)


    function convertNumber(value) {
        if (!value) return 0;
        const convertValue = value.toString().replace(/\./g, '').replace(',', '.');
        return parseFloat(convertValue) || 0;
    }

    function handleInput(e) {
        let input = e.target;

        let rawValue = input.value.replace(/[^0-9,]/g, '');

        let parts = rawValue.split(',');

        if (parts.length > 2) {
            rawValue = parts[0] + ',' + parts.slice(1).join('');
            parts = rawValue.split(',');
        }

        let integerPart = parts[0];
        integerPart = integerPart.replace(/\./g, '');

        let formattedInteger = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

        if (parts.length > 1) {
            input.value = formattedInteger + ',' + parts[1];
        } else {
            input.value = formattedInteger;
        }

        hitung();
    }

    function hitung() {
        const jumlah = convertNumber(jumlahInput.value);
        const rate = convertNumber(rateInput.value);

        const total = jumlah * rate;

        jumlahRp.value = total.toLocaleString('id-ID', {
            minimumFractionDigits: 0,
            maximumFractionDigits: 2
        });
    }

    async function getCurrency(currency) {
        if (currency == "IDR") {
            rateInput.value = "1";
            hitung();
            return;
        }

        rateInput.value = "Loading...";
        jumlahRp.value = "";

        try {
            const response = await fetch(`https://api.frankfurter.dev/v1/latest?base=${currency}&symbols=IDR`)
            if (!response.ok) {
                throw new Error(`Gagal mendapatkan data : ${response.statusText}`)
            }
            const data = await response.json();
            const ratesIDR = data.rates.IDR;

            rateInput.value = new Intl.NumberFormat('id-ID', {
                minimumFractionDigits: 0,
                maximumFractionDigits: 2
            }).format(ratesIDR);

            hitung();

        } catch (err) {
            console.log(err)
            rateInput.value = ""

            Swal.fire({
                title: "Error",
                text: `${currency} tidak ditemukan atau gagal memuat. Mohon input manual.`,
                icon: "error"
            })
        }
    }
})