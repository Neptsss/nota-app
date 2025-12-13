document.addEventListener('DOMContentLoaded', function () {
    const currency = document.getElementById('mata_uang');
    const rate = document.getElementById('rate');

    currency.addEventListener('change', () => {
        let currencyValue = currency.value
        getExchange(currencyValue)
    })


    async function getExchange(currency) {
        if (currency === "IDR") {
            rate.value = 1
            return;
        }

        rate.value = "loading..."

        try {
            const respone = await fetch(`https://api.frankfurter.app/latest?from=${currency}&to=IDR`);
            if (!respone.ok) throw new Error("Gagal mengambil data API");

            const data = await respone.json()

            let nilaiRate = data.rates.IDR;
            rate.value = new Intl.NumberFormat('id-ID').format(nilaiRate);

        } catch (err) {
            console.log(err)
            rate.value = "";
            Swal.fire({
                title: "Error",
                text: `${currency} tidak ditemukan. Mohon input manual.`,
                icon: "error"
            });
        }


    }
})
