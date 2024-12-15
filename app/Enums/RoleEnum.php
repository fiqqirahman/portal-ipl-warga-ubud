<?php

namespace App\Enums;

enum RoleEnum: string
{
	case SuperAdmin = 'Super Admin';
	case Developer = 'Developer';
	case Vendor = 'Vendor';
	case OperatorVendorManajemen = 'Operator Vendor Manajemen';
    case Warga = 'Warga';
    case Bendahara = 'Bendahara';
    case KetuaRT = 'Ketua RT';
}
