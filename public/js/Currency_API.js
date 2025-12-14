document.addEventListener('DOMContentLoaded', () => {
    const mata_uang = document.querySelector('select[name="mata_uang"]')
    const rateInput = document.querySelector('input[name="rate"]')

    mata_uang.addEventListener('change', (e) => {
        getCurrency(e.target.value)
    })
    
    async function getCurrency(currency) {

        if (currency == "IDR") {
            rateInput.value = 1
            return
        }

        rateInput.value = "Loading..."

        try {
            const response = await fetch(`https://api.frankfurter.dev/v1/latest?base=${currency}&symbols=IDR`)
            if (!response.ok) {
                throw new Error(`Gagal mendapatkan data : ${response.statusText}`)
            }
            console.log(response)
            const data = await response.json();

            const ratesIDR = data.rates.IDR;
            rateInput.setAttribute('disabled', 'true')
            rateInput.classList.add('bg-gray-300')
            rateInput.classList.remove('border')
            rateInput.value = new Intl.NumberFormat('id-ID').format(ratesIDR);

        } catch (err) {
            console.log(err)
            rateInput.removeAttribute('disabled')
            rateInput.classList.remove('bg-gray-300')
            rateInput.classList.add('border')
            rateInput.value = ""

            Swal.fire({
                title: "Error",
                text: `${currency} tidak ditemukan. Mohon input manual.`,
                icon: "error"
            })
        }
    }
})
