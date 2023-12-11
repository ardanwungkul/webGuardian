<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Report - {{ $domain->nama_domain }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>

    <button onclick="convertToPDF()"
        style="position: fixed; top: 5px ;left: 5px ; padding:5px 10px; background-color: white ;border: 1px solid; border-radius: 9px ; font-size: 14px">Export
        to PDF</button>

    <div id="report" style="padding: 8px; background-color: #C4DFDF;min-height: 100vh">
        <div style="margin-bottom: 5px">
            <h2 style="text-align: center">
                Report {{ $domain->kategori->nama_kategori }} {{ $domain->nama_domain }}
            </h2>
        </div>
        <div class="border mx-auto" style="max-width: 900px; border-radius: 8px;">
            @if (isset($domain->reports) && count($domain->reports) > 0)
                <div class="accordion" id="accordionReport">
                    @php
                        $groupedData = $domain->reports->sortBy('tanggal_report')->groupBy(function ($item) {
                            return date('Y-m-d', strtotime($item->tanggal_report));
                        });
                    @endphp
                    @foreach ($groupedData as $date => $items)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-{{ $date }}" aria-expanded="true"
                                    aria-controls="collapse-{{ $date }}">
                                    <div class="d-flex justify-content-between w-100" style="margin-right: 10px">
                                        <p class="m-0" style="font-size: 14px">
                                            {{ date('j F Y', strtotime($date)) }}
                                        </p>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapse-{{ $date }}" class="accordion-collapse collapse show"
                                data-bs-parent="#accordionReport">
                                <div class="accordion-body">
                                    @foreach ($items as $item)
                                        <div style="margin-bottom: 5px">
                                            <p class="m-0"
                                                style="text-align: center; font-weight: 700; text-transform: capitalize;font-size: 18px;  background-color: #C4DFDF; border-radius: 8px">
                                                {{ $item->judul }}
                                            </p>
                                            <div
                                                style="padding: 8px; background-color: white; border-radius: 8px; overflow-wrap: anywhere; word-break: break-all">
                                                {!! html_entity_decode($item->report) !!}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div style="background-color: white; border-radius: 8px; padding: 8px; text-align: center">
                    Tidak ada Report
                </div>
            @endif
        </div>

    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script type="text/javascript">
    function openAllAccordions() {
        const accordions = document.querySelectorAll('.accordion-collapse');
        accordions.forEach(accordion => {
            accordion.classList.add('show');
        });

    }

    function convertToPDF() {
        const {
            jsPDF
        } = window.jspdf;
        openAllAccordions();

        const pdf = new jsPDF();
        const element = document.getElementById('report');
        html2pdf().from(element).save();

    }
</script>

</html>
