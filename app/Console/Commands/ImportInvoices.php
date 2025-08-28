<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportInvoices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-invoices';
    protected $description = 'Import invoices from external JSON feed';

    /**
     * The console command description.
     *
     * @var string
     */

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = storage_path('app/feeds/invoices.json');

        if (!file_exists($path)) {
            $this->error("Arquivo de feed não encontrado: {$path}");
            return;
        }

        $json = file_get_contents($path);
        $data = json_decode($json, true);

        foreach ($data as $invoiceData) {
            app(\App\Services\InvoiceService::class)->createInvoice($invoiceData);
        }

        $this->info('Invoices importadas com sucesso!');
    }
}
