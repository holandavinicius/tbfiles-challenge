@props(['token'])

<div class="d-flex justify-content-center">
    <table border="1" cellpadding="5" cellspacing="0" id="vendors-table">
        <thead>
        <tr>
            <th>Vendor ID</th>
            <th>Name</th>
            <th>Total Orders</th>
            <th>Total Amount</th>
            <th>Pending Invoices</th>
            <th>Amount Pending</th>
            <th>Amount Paid</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            try {
                const token = "{{ $token }}";

                const response = await fetch('/api/vendors/summaries', {
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                });

                const data = await response.json();
                const tbody = document.querySelector('#vendors-table tbody');
                tbody.innerHTML = '';

                data.forEach(item => {
                    const tr = document.createElement('tr');

                    tr.innerHTML = `
        <td>${item.vendor.id}</td>
        <td>${item.vendor.name}</td>
        <td>${item.summary.total_invoices}</td>
        <td>${item.summary.total_amount}</td>
        <td>${item.summary.pending_invoices}</td>
        <td>${item.summary.pending_amount}</td>
        <td>${item.summary.paid_amount}</td>
    `;

                    tbody.appendChild(tr);
                });

            } catch (err) {
                console.error(err);
                alert('Erro ao carregar dados da API');
            }
        });
    </script>
