$(function () {
  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
  });

  $(".kt_default_datatable").DataTable({
    responsive: true,
    paging: false,
    info: false,
    lengthChange: false,
    autoWidth: false,
    order: [],
  });

  $(".kt_datatable_responsive").DataTable({
    responsive: true,
    lengthChange: true,
    autoWidth: false,
    order: [],
  });

  let dynamicSearchTable = $(".kt_datatable_dynamic_search").DataTable();

  $("[data-kt-filter='search']").on("keyup", function () {
    dynamicSearchTable.search(this.value).draw();
  });

  // function to disabled button submit on form that you submitted
  // you must create class="form" on your form element
  $(".form").on("submit", function () {
    $(this)
      .find(":submit")
      .html(
        "<span class='spinner-border spinner-border-sm align-middle ms-2'></span>"
      )
      .prop("disabled", true);
  });
  // end of function
});

$(".numeric").numeric({});
$(".positive-numeric").numeric({
  negative: false,
}); // do not allow negative values

$(".text-uppercase").on("keyup", function () {
  this.value = this.value.toUpperCase();
}); // force value to upper

$(".text-uppercase").on("change", function () {
  this.value = this.value.toUpperCase();
}); // force value to upper

$(".text-lowercase").on("keyup", function () {
  this.value = this.value.toLowerCase();
}); // force value to lower

$(".text-lowercase").on("change", function () {
  this.value = this.value.toLowerCase();
}); // force value to lower

// formatting value to indonesian currency
// ex rupiahIndonesia.format(100000)
// output : Rp 100.000,00
const rupiahIndonesia = new Intl.NumberFormat("id-ID", {
  style: "currency",
  currency: "IDR",
});

// single datePicker
$("#kt_default_daterangepicker").daterangepicker({
  singleDatePicker: true,
  showDropdowns: true,
  autoUpdateInput: false,
  locale: {
    cancelLabel: "Clear",
    format: "YYYY-MM-DD",
    monthNames: [
      "Januari",
      "Februari",
      "Maret",
      "April",
      "Mei",
      "Juni",
      "Juli",
      "Agustus",
      "September",
      "Oktober",
      "November",
      "Desember",
    ],
  },
});

$("#kt_default_daterangepicker").on(
  "apply.daterangepicker",
  function (ev, picker) {
    $(this).val(picker.startDate.format("YYYY-MM-DD"));
  }
);

$("#kt_default_daterangepicker").on(
  "cancel.daterangepicker",
  function () {
    $(this).val('');
  }
);

function onDocumentChange(input, allowedMimes, maxFileSize) {
    const FileName = input.files[0] ? input.files[0].name : null;
    if (FileName) {
        const FileMime = FileName.substring(FileName.lastIndexOf('.') + 1).toLowerCase();
        const fileTypes = allowedMimes.split(',');
        if (fileTypes.includes(FileMime)) {
            const maxSize = maxFileSize * 1024
            if (input.files[0].size > maxSize) {
                Swal.fire(`File Size Dokumen tidak boleh lebih dari ${convertToReadableSize(maxSize)}!`);
                input.value = null;
            }
        } else {
            Swal.fire(`Dokumen hanya boleh dalam format ${fileTypes.join(', ').toUpperCase()}!`);
            input.value = null;
        }
    }
}

function convertToReadableSize(size) {
    const base = Math.log(size) / Math.log(1024);
    const suffix = ['', 'KB', 'MB', 'GB', 'TB'];
    const fBase = Math.floor(base);
    return ((Math.pow(1024, base - fBase)).toFixed(1) + ' ' + suffix[fBase]).replace('.0','');
}

function convertToFormatRupiah(amount, includeCents = false) {
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: includeCents ? 2 : 0,
        maximumFractionDigits: includeCents ? 2 : 0,
    }).format(amount);
}

function formatRupiah(element) {
    let value = element.value.replace(/[^,\d]/g, '').toString();
    let splitValue = value.split(',');
    let sisa = splitValue[0].length % 3;
    let rupiah = splitValue[0].substr(0, sisa);
    let ribuan = splitValue[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        let separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = splitValue[1] !== undefined ? rupiah + ',' + splitValue[1] : rupiah;
    element.value = rupiah ? 'Rp ' + rupiah : '';
}

function cleanFormatRupiah(formattedRupiah) {
    if (!formattedRupiah) {
        return 0;
    }

    return parseInt(formattedRupiah.replace(/\D/g, ''), 10);
}

function uniqueString(length) {
    let result = '';
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    const charactersLength = characters.length;
    let counter = 0;
    while (counter < length) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
        counter += 1;
    }
    return result;
}
