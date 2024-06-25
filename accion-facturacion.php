<?php
require 'vendor/autoload.php';

use Afip;

$afip = new Afip(array('CUIT' => 20409378472)); // CUIT de la empresa (sin puntos ni guión)

#==========================================================================================================

#---certificado para desarrollo (opcional)-----


// CUIT al cual le queremos generar el certificado
$tax_id = 201111111111;

// Usuario para ingresar a AFIP.
// Para la mayoria es el mismo CUIT, pero al administrar
// una sociedad el CUIT con el que se ingresa es el del administrador
// de la sociedad.
$username = '201111111111';

// Contraseña para ingresar a AFIP.
$password = 'contraseñadeafip';

// Alias para el certificado (Nombre para reconocerlo en AFIP)
// un alias puede tener muchos certificados, si estas renovando
// un certificado podes utilizar el mismo alias
$alias = 'afipsdk';

// Creamos una instancia de la libreria
$afip = new Afip(array('CUIT' => $tax_id));

// Creamos el certificado (¡Paciencia! Esto toma unos cuantos segundos)
//$res = $afip->CreateCert(username, password, alias);

// Mostramos el certificado por pantalla
//var_dump($res->cert);

// Mostramos la key por pantalla
//var_dump($res->key);

// ATENCION! Recorda guardar el cert y key ya que 
// la libreria por seguridad no los guarda, esto depende de vos.
// Si no lo guardas vas tener que generar uno nuevo con este metodo


#========================================================================
#                          creo una nueva instancia de afip                             
#===========================================================================

// Certificado (Puede estar guardado en archivos, DB, etc)
$cert = file_get_contents('./certificado.crt');

// Key (Puede estar guardado en archivos, DB, etc)
$key = file_get_contents('./key.key');

// Tu CUIT
$tax_id = 20111111112;

$afip = new Afip(
    array(
        'CUIT' => $tax_id,
        'cert' => $cert,
        'key' => $key
    )
);



#============================================================================
#                          autorizacion de afip (login en afip)
#===========================================================================

// CUIT al cual le queremos generar la autorización
$tax_id = 201111111111;

// Usuario para ingresar a AFIP.
// Para la mayoria es el mismo CUIT, pero al administrar
// una sociedad el CUIT con el que se ingresa es el del administrador
// de la sociedad.
$username = '201111111111';

// Contraseña para ingresar a AFIP.
$password = 'contraseñadeafip';

// Alias del certificado a autorizar (previamente creado)
$alias = 'afipsdk';

// Id del web service a autorizar
$wsid = 'wsfe';

// Creamos una instancia de la libreria
$afip = new Afip(array('CUIT' => $tax_id));

// Creamos la autorizacion (¡Paciencia! Esto toma unos cuantos segundos)
$res = $afip->CreateWSAuth($username, $password, $alias, $wsid);

// Mostramos el resultado por pantalla
var_dump($res);


#==============================================================================
#                      facturacion pdf
#==============================================================================

// Descargamos el HTML de ejemplo (ver mas arriba)
// y lo guardamos como bill.html
$html = file_get_contents('./bill.html');

// Nombre para el archivo (sin .pdf)
$name = 'PDF de prueba';

// Opciones para el archivo
$options = array(
    "width" => 8, // Ancho de pagina en pulgadas. Usar 3.1 para ticket
    "marginLeft" => 0.4, // Margen izquierdo en pulgadas. Usar 0.1 para ticket 
    "marginRight" => 0.4, // Margen derecho en pulgadas. Usar 0.1 para ticket 
    "marginTop" => 0.4, // Margen superior en pulgadas. Usar 0.1 para ticket 
    "marginBottom" => 0.4 // Margen inferior en pulgadas. Usar 0.1 para ticket 
);

// Creamos el PDF
$res = $afip->ElectronicBilling->CreatePDF(
    array(
        "html" => $html,
        "file_name" => $name,
        "options" => $options
    )
);

// Mostramos la url del archivo creado
var_dump($res['file']);



#=============================================================================
#                              facturas
#=============================================================================
$facturaTipo = "";
switch ($facturaTipo) {
    case 'A':
        /**
         * Numero del punto de venta
         **/
        $punto_de_venta = 1;

        /**
         * Tipo de factura
         **/
        $tipo_de_factura = 1; // 1 = Factura A

        /**
         * Número de la ultima Factura A
         **/
        $last_voucher = $afip->ElectronicBilling->GetLastVoucher($punto_de_venta, $tipo_de_factura);

        /**
         * Concepto de la factura
         *
         * Opciones:
         *
         * 1 = Productos 
         * 2 = Servicios 
         * 3 = Productos y Servicios
         **/
        $concepto = 1;

        /**
         * Tipo de documento del comprador
         *
         * Opciones:
         *
         * 80 = CUIT 
         * 86 = CUIL 
         * 96 = DNI
         * 99 = Consumidor Final 
         **/
        $tipo_de_documento = 80;

        /**
         * Numero de documento del comprador (0 para consumidor final)
         **/
        $numero_de_documento = 33693450239;

        /**
         * Numero de factura
         **/
        $numero_de_factura = $last_voucher + 1;

        /**
         * Fecha de la factura en formato aaaa-mm-dd (hasta 10 dias antes y 10 dias despues)
         **/
        $fecha = date('Y-m-d');

        /**
         * Importe sujeto al IVA (sin icluir IVA)
         **/
        $importe_gravado = 100;

        /**
         * Importe exento al IVA
         **/
        $importe_exento_iva = 0;

        /**
         * Importe de IVA
         **/
        $importe_iva = 21;

        /**
         * Los siguientes campos solo son obligatorios para los conceptos 2 y 3
         **/
        if ($concepto === 2 || $concepto === 3) {
            /**
             * Fecha de inicio de servicio en formato aaaammdd
             **/
            $fecha_servicio_desde = intval(date('Ymd'));

            /**
             * Fecha de fin de servicio en formato aaaammdd
             **/
            $fecha_servicio_hasta = intval(date('Ymd'));

            /**
             * Fecha de vencimiento del pago en formato aaaammdd
             **/
            $fecha_vencimiento_pago = intval(date('Ymd'));
        } else {
            $fecha_servicio_desde = null;
            $fecha_servicio_hasta = null;
            $fecha_vencimiento_pago = null;
        }

        $data = array(
            'CantReg' => 1, // Cantidad de facturas a registrar
            'PtoVta' => $punto_de_venta,
            'CbteTipo' => $tipo_de_factura,
            'Concepto' => $concepto,
            'DocTipo' => $tipo_de_documento,
            'DocNro' => $numero_de_documento,
            'CbteDesde' => $numero_de_factura,
            'CbteHasta' => $numero_de_factura,
            'CbteFch' => intval(str_replace('-', '', $fecha)),
            'FchServDesde' => $fecha_servicio_desde,
            'FchServHasta' => $fecha_servicio_hasta,
            'FchVtoPago' => $fecha_vencimiento_pago,
            'ImpTotal' => $importe_gravado + $importe_iva + $importe_exento_iva,
            'ImpTotConc' => 0, // Importe neto no gravado
            'ImpNeto' => $importe_gravado,
            'ImpOpEx' => $importe_exento_iva,
            'ImpIVA' => $importe_iva,
            'ImpTrib' => 0, //Importe total de tributos
            'MonId' => 'PES', //Tipo de moneda usada en la factura ('PES' = pesos argentinos) 
            'MonCotiz' => 1, // Cotización de la moneda usada (1 para pesos argentinos)  
            'Iva' => array(// Alícuotas asociadas al factura
                array(
                    'Id' => 5, // Id del tipo de IVA (5 = 21%)
                    'BaseImp' => $importe_gravado,
                    'Importe' => $importe_iva
                )
            ),
        );

        /** 
         * Creamos la Factura 
         **/
        $res = $afip->ElectronicBilling->CreateVoucher($data);

        /**
         * Mostramos por pantalla los datos de la nueva Factura 
         **/
        var_dump(
            array(
                'cae' => $res['CAE'], //CAE asignado a la Factura
                'vencimiento' => $res['CAEFchVto'] //Fecha de vencimiento del CAE
            )
        );
        break;
    case 'B':
        /**
         * Numero del punto de venta
         **/
        $punto_de_venta = 1;

        /**
         * Tipo de factura
         **/
        $tipo_de_factura = 6; // 6 = Factura B

        /**
         * Número de la ultima Factura B
         **/
        $last_voucher = $afip->ElectronicBilling->GetLastVoucher($punto_de_venta, $tipo_de_factura);

        /**
         * Concepto de la factura
         *
         * Opciones:
         *
         * 1 = Productos 
         * 2 = Servicios 
         * 3 = Productos y Servicios
         **/
        $concepto = 1;

        /**
         * Tipo de documento del comprador
         *
         * Opciones:
         *
         * 80 = CUIT 
         * 86 = CUIL 
         * 96 = DNI
         * 99 = Consumidor Final 
         **/
        $tipo_de_documento = 99;

        /**
         * Numero de documento del comprador (0 para consumidor final)
         **/
        $numero_de_documento = 0;

        /**
         * Numero de factura
         **/
        $numero_de_factura = $last_voucher + 1;

        /**
         * Fecha de la factura en formato aaaa-mm-dd (hasta 10 dias antes y 10 dias despues)
         **/
        $fecha = date('Y-m-d');

        /**
         * Importe sujeto al IVA (sin icluir IVA)
         **/
        $importe_gravado = 100;

        /**
         * Importe exento al IVA
         **/
        $importe_exento_iva = 0;

        /**
         * Importe de IVA
         **/
        $importe_iva = 21;

        /**
         * Los siguientes campos solo son obligatorios para los conceptos 2 y 3
         **/
        if ($concepto === 2 || $concepto === 3) {
            /**
             * Fecha de inicio de servicio en formato aaaammdd
             **/
            $fecha_servicio_desde = intval(date('Ymd'));

            /**
             * Fecha de fin de servicio en formato aaaammdd
             **/
            $fecha_servicio_hasta = intval(date('Ymd'));

            /**
             * Fecha de vencimiento del pago en formato aaaammdd
             **/
            $fecha_vencimiento_pago = intval(date('Ymd'));
        } else {
            $fecha_servicio_desde = null;
            $fecha_servicio_hasta = null;
            $fecha_vencimiento_pago = null;
        }

        $data = array(
            'CantReg' => 1, // Cantidad de facturas a registrar
            'PtoVta' => $punto_de_venta,
            'CbteTipo' => $tipo_de_factura,
            'Concepto' => $concepto,
            'DocTipo' => $tipo_de_documento,
            'DocNro' => $numero_de_documento,
            'CbteDesde' => $numero_de_factura,
            'CbteHasta' => $numero_de_factura,
            'CbteFch' => intval(str_replace('-', '', $fecha)),
            'FchServDesde' => $fecha_servicio_desde,
            'FchServHasta' => $fecha_servicio_hasta,
            'FchVtoPago' => $fecha_vencimiento_pago,
            'ImpTotal' => $importe_gravado + $importe_iva + $importe_exento_iva,
            'ImpTotConc' => 0, // Importe neto no gravado
            'ImpNeto' => $importe_gravado,
            'ImpOpEx' => $importe_exento_iva,
            'ImpIVA' => $importe_iva,
            'ImpTrib' => 0, //Importe total de tributos
            'MonId' => 'PES', //Tipo de moneda usada en la factura ('PES' = pesos argentinos) 
            'MonCotiz' => 1, // Cotización de la moneda usada (1 para pesos argentinos)  
            'Iva' => array(// Alícuotas asociadas al factura
                array(
                    'Id' => 5, // Id del tipo de IVA (5 = 21%)
                    'BaseImp' => $importe_gravado,
                    'Importe' => $importe_iva
                )
            ),
        );

        /** 
         * Creamos la Factura 
         **/
        $res = $afip->ElectronicBilling->CreateVoucher($data);

        /**
         * Mostramos por pantalla los datos de la nueva Factura 
         **/
        var_dump(
            array(
                'cae' => $res['CAE'], //CAE asignado a la Factura
                'vencimiento' => $res['CAEFchVto'] //Fecha de vencimiento del CAE
            )
        );
        break;

    case 'C':
        /**
         * Numero del punto de venta
         **/
        $punto_de_venta = 1;

        /**
         * Tipo de factura
         **/
        $tipo_de_comprobante = 11; // 11 = Factura C

        /**
         * Número de la ultima Factura C
         **/
        $last_voucher = $afip->ElectronicBilling->GetLastVoucher($punto_de_venta, $tipo_de_comprobante);

        /**
         * Concepto de la factura
         *
         * Opciones:
         *
         * 1 = Productos 
         * 2 = Servicios 
         * 3 = Productos y Servicios
         **/
        $concepto = 1;

        /**
         * Tipo de documento del comprador
         *
         * Opciones:
         *
         * 80 = CUIT 
         * 86 = CUIL 
         * 96 = DNI
         * 99 = Consumidor Final 
         **/
        $tipo_de_documento = 80;

        /**
         * Numero de documento del comprador (0 para consumidor final)
         **/
        $numero_de_documento = 33693450239;

        /**
         * Numero de comprobante
         **/
        $numero_de_factura = $last_voucher + 1;

        /**
         * Fecha de la factura en formato aaaa-mm-dd (hasta 10 dias antes y 10 dias despues)
         **/
        $fecha = date('Y-m-d');

        /**
         * Importe de la Factura
         **/
        $importe_total = 100;

        /**
         * Los siguientes campos solo son obligatorios para los conceptos 2 y 3
         **/
        if ($concepto === 2 || $concepto === 3) {
            /**
             * Fecha de inicio de servicio en formato aaaammdd
             **/
            $fecha_servicio_desde = intval(date('Ymd'));

            /**
             * Fecha de fin de servicio en formato aaaammdd
             **/
            $fecha_servicio_hasta = intval(date('Ymd'));

            /**
             * Fecha de vencimiento del pago en formato aaaammdd
             **/
            $fecha_vencimiento_pago = intval(date('Ymd'));
        } else {
            $fecha_servicio_desde = null;
            $fecha_servicio_hasta = null;
            $fecha_vencimiento_pago = null;
        }


        $data = array(
            'CantReg' => 1, // Cantidad de facturas a registrar
            'PtoVta' => $punto_de_venta,
            'CbteTipo' => $tipo_de_comprobante,
            'Concepto' => $concepto,
            'DocTipo' => $tipo_de_documento,
            'DocNro' => $numero_de_documento,
            'CbteDesde' => $numero_de_factura,
            'CbteHasta' => $numero_de_factura,
            'CbteFch' => intval(str_replace('-', '', $fecha)),
            'FchServDesde' => $fecha_servicio_desde,
            'FchServHasta' => $fecha_servicio_hasta,
            'FchVtoPago' => $fecha_vencimiento_pago,
            'ImpTotal' => $importe_total,
            'ImpTotConc' => 0, // Importe neto no gravado
            'ImpNeto' => $importe_total, // Importe neto
            'ImpOpEx' => 0, // Importe exento al IVA
            'ImpIVA' => 0, // Importe de IVA
            'ImpTrib' => 0, //Importe total de tributos
            'MonId' => 'PES', //Tipo de moneda usada en la factura ('PES' = pesos argentinos) 
            'MonCotiz' => 1, // Cotización de la moneda usada (1 para pesos argentinos)  
        );

        /** 
         * Creamos la Factura 
         **/
        $res = $afip->ElectronicBilling->CreateVoucher($data);

        /**
         * Mostramos por pantalla los datos de la nueva Factura 
         **/
        var_dump(
            array(
                'cae' => $res['CAE'], //CAE asignado a la Factura
                'vencimiento' => $res['CAEFchVto'] //Fecha de vencimiento del CAE
            )
        );
        break;
    case 'A de credito electronica':
        /**
         * Numero del punto de venta
         **/
        $punto_de_venta = 1;

        /**
         * Tipo de factura
         **/
        $tipo_de_factura = 201; // 201 = Factura de Crédito electrónica MiPyMEs (FCE) A

        /**
         * Número de la ultima Factura de Crédito electrónica MiPyMEs (FCE) A
         **/
        $last_voucher = $afip->ElectronicBilling->GetLastVoucher($punto_de_venta, $tipo_de_factura);

        /**
         * Concepto de la factura
         *
         * Opciones:
         *
         * 1 = Productos 
         * 2 = Servicios 
         * 3 = Productos y Servicios
         **/
        $concepto = 1;

        /**
         * Tipo de documento del comprador
         *
         * Opciones:
         *
         * 80 = CUIT 
         * 86 = CUIL 
         * 96 = DNI
         * 99 = Consumidor Final 
         **/
        $tipo_de_documento = 80;

        /**
         * Numero de documento del comprador (0 para consumidor final)
         **/
        $numero_de_documento = 30679928879;

        /**
         * Numero de factura
         **/
        $numero_de_factura = $last_voucher + 1;

        /**
         * Numero de CBU del cliente
         * Es requerido para realizar una factura de crédito electrónica
         **/
        $CBU = '1234567890123456789012';

        /**
         * Tipo de Transferencia
         * Es requerido para realizar una factura de crédito electrónica
         * SCA = 'TRANSFERENCIA AL SISTEMA DE CIRCULACION ABIERTA'
         * ADC = 'AGENTE DE DEPOSITO COLECTIVO'
         **/
        $transferencia = 'ADC';

        /**
         * Fecha de la factura en formato aaaa-mm-dd (hasta 10 dias antes y 10 dias despues)
         **/
        $fecha = date('Y-m-d');

        /**
         * Fecha de vencimiento del pago en formato aaaa-mm-dd
         **/
        $fecha_vencimiento_pago = date('Y-m-d');

        /**
         * Importe sujeto al IVA (sin icluir IVA)
         **/
        $importe_gravado = 100000;

        /**
         * Importe exento al IVA
         **/
        $importe_exento_iva = 0;

        /**
         * Importe de IVA
         **/
        $importe_iva = 21000;

        /**
         * Los siguientes campos solo son obligatorios para los conceptos 2 y 3
         **/
        if ($concepto === 2 || $concepto === 3) {
            /**
             * Fecha de inicio de servicio en formato aaaammdd
             **/
            $fecha_servicio_desde = intval(date('Ymd'));

            /**
             * Fecha de fin de servicio en formato aaaammdd
             **/
            $fecha_servicio_hasta = intval(date('Ymd'));
        } else {
            $fecha_servicio_desde = null;
            $fecha_servicio_hasta = null;
        }

        $data = array(
            'CantReg' => 1, // Cantidad de facturas a registrar
            'PtoVta' => $punto_de_venta,
            'CbteTipo' => $tipo_de_factura,
            'Concepto' => $concepto,
            'DocTipo' => $tipo_de_documento,
            'DocNro' => $numero_de_documento,
            'CbteDesde' => $numero_de_factura,
            'CbteHasta' => $numero_de_factura,
            'CbteFch' => intval(str_replace('-', '', $fecha)),
            'FchServDesde' => $fecha_servicio_desde,
            'FchServHasta' => $fecha_servicio_hasta,
            'FchVtoPago' => intval(str_replace('-', '', $fecha_vencimiento_pago)),
            'ImpTotal' => $importe_gravado + $importe_iva + $importe_exento_iva,
            'ImpTotConc' => 0, // Importe neto no gravado
            'ImpNeto' => $importe_gravado,
            'ImpOpEx' => $importe_exento_iva,
            'ImpIVA' => $importe_iva,
            'ImpTrib' => 0, //Importe total de tributos
            'MonId' => 'PES', //Tipo de moneda usada en la factura ('PES' = pesos argentinos) 
            'MonCotiz' => 1, // Cotización de la moneda usada (1 para pesos argentinos)  
            'Iva' => array(// Alícuotas asociadas al factura
                array(
                    'Id' => 5, // Id del tipo de IVA (5 = 21%)
                    'BaseImp' => $importe_gravado,
                    'Importe' => $importe_iva
                )
            ),
            'Opcionales' => array( // (Opcional) Alícuotas asociadas al comprobante
                array(
                    'Id' => 2101, // ID del campo opcion opcional (2101 = CBU)
                    'Valor' => $CBU
                ),
                array(
                    'Id' => 27, // ID del campo opcion opcional (27 = Transferencia)
                    'Valor' => $transferencia
                )
            ),
        );

        /** 
         * Creamos la Factura 
         **/
        $res = $afip->ElectronicBilling->CreateVoucher($data);

        /**
         * Mostramos por pantalla los datos de la nueva Factura 
         **/
        var_dump(
            array(
                'cae' => $res['CAE'], //CAE asignado a la Factura
                'vencimiento' => $res['CAEFchVto'] //Fecha de vencimiento del CAE
            )
        );
        break;

    case 'B de credito electronica':
        /**
         * Numero del punto de venta
         **/
        $punto_de_venta = 1;

        /**
         * Tipo de factura
         **/
        $tipo_de_factura = 206; // 206 = Factura de Crédito electrónica MiPyMEs (FCE) B

        /**
         * Número de la ultima Factura de Crédito electrónica MiPyMEs (FCE) B
         **/
        $last_voucher = $afip->ElectronicBilling->GetLastVoucher($punto_de_venta, $tipo_de_factura);

        /**
         * Concepto de la factura
         *
         * Opciones:
         *
         * 1 = Productos 
         * 2 = Servicios 
         * 3 = Productos y Servicios
         **/
        $concepto = 1;

        /**
         * Tipo de documento del comprador
         *
         * Opciones:
         *
         * 80 = CUIT 
         * 86 = CUIL 
         * 96 = DNI
         * 99 = Consumidor Final 
         **/
        $tipo_de_documento = 80;

        /**
         * Numero de documento del comprador (0 para consumidor final)
         **/
        $numero_de_documento = 30679928879;

        /**
         * Numero de factura
         **/
        $numero_de_factura = $last_voucher + 1;

        /**
         * Numero de CBU del cliente
         * Es requerido para realizar una factura de crédito electrónica
         **/
        $CBU = '1234567890123456789012';

        /**
         * Tipo de Transferencia
         * Es requerido para realizar una factura de crédito electrónica
         * SCA = 'TRANSFERENCIA AL SISTEMA DE CIRCULACION ABIERTA'
         * ADC = 'AGENTE DE DEPOSITO COLECTIVO'
         **/
        $transferencia = 'ADC';

        /**
         * Fecha de la factura en formato aaaa-mm-dd (hasta 10 dias antes y 10 dias despues)
         **/
        $fecha = date('Y-m-d');

        /**
         * Fecha de vencimiento del pago en formato aaaa-mm-dd
         **/
        $fecha_vencimiento_pago = date('Y-m-d');

        /**
         * Importe sujeto al IVA (sin icluir IVA)
         **/
        $importe_gravado = 100000;

        /**
         * Importe exento al IVA
         **/
        $importe_exento_iva = 0;

        /**
         * Importe de IVA
         **/
        $importe_iva = 21000;

        /**
         * Los siguientes campos solo son obligatorios para los conceptos 2 y 3
         **/
        if ($concepto === 2 || $concepto === 3) {
            /**
             * Fecha de inicio de servicio en formato aaaammdd
             **/
            $fecha_servicio_desde = intval(date('Ymd'));

            /**
             * Fecha de fin de servicio en formato aaaammdd
             **/
            $fecha_servicio_hasta = intval(date('Ymd'));
        } else {
            $fecha_servicio_desde = null;
            $fecha_servicio_hasta = null;
        }

        $data = array(
            'CantReg' => 1, // Cantidad de facturas a registrar
            'PtoVta' => $punto_de_venta,
            'CbteTipo' => $tipo_de_factura,
            'Concepto' => $concepto,
            'DocTipo' => $tipo_de_documento,
            'DocNro' => $numero_de_documento,
            'CbteDesde' => $numero_de_factura,
            'CbteHasta' => $numero_de_factura,
            'CbteFch' => intval(str_replace('-', '', $fecha)),
            'FchServDesde' => $fecha_servicio_desde,
            'FchServHasta' => $fecha_servicio_hasta,
            'FchVtoPago' => intval(str_replace('-', '', $fecha_vencimiento_pago)),
            'ImpTotal' => $importe_gravado + $importe_iva + $importe_exento_iva,
            'ImpTotConc' => 0, // Importe neto no gravado
            'ImpNeto' => $importe_gravado,
            'ImpOpEx' => $importe_exento_iva,
            'ImpIVA' => $importe_iva,
            'ImpTrib' => 0, //Importe total de tributos
            'MonId' => 'PES', //Tipo de moneda usada en la factura ('PES' = pesos argentinos) 
            'MonCotiz' => 1, // Cotización de la moneda usada (1 para pesos argentinos)  
            'Iva' => array(// Alícuotas asociadas al factura
                array(
                    'Id' => 5, // Id del tipo de IVA (5 = 21%)
                    'BaseImp' => $importe_gravado,
                    'Importe' => $importe_iva
                )
            ),
            'Opcionales' => array( // (Opcional) Alícuotas asociadas al comprobante
                array(
                    'Id' => 2101, // ID del campo opcion opcional (2101 = CBU)
                    'Valor' => $CBU
                ),
                array(
                    'Id' => 27, // ID del campo opcion opcional (27 = Transferencia)
                    'Valor' => $transferencia
                )
            ),
        );

        /** 
         * Creamos la Factura 
         **/
        $res = $afip->ElectronicBilling->CreateVoucher($data);

        /**
         * Mostramos por pantalla los datos de la nueva Factura 
         **/
        var_dump(
            array(
                'cae' => $res['CAE'], //CAE asignado a la Factura
                'vencimiento' => $res['CAEFchVto'] //Fecha de vencimiento del CAE
            )
        );
        break;

    case 'C de credito electronica':
        /**
         * Numero del punto de venta
         **/
        $punto_de_venta = 1;

        /**
         * Tipo de factura
         **/
        $tipo_de_factura = 211; // 211 = Factura de Crédito electrónica MiPyMEs (FCE) C

        /**
         * Número de la ultima Factura de Crédito electrónica MiPyMEs (FCE) C
         **/
        $last_voucher = $afip->ElectronicBilling->GetLastVoucher($punto_de_venta, $tipo_de_factura);

        /**
         * Concepto de la factura
         *
         * Opciones:
         *
         * 1 = Productos 
         * 2 = Servicios 
         * 3 = Productos y Servicios
         **/
        $concepto = 1;

        /**
         * Tipo de documento del comprador
         *
         * Opciones:
         *
         * 80 = CUIT 
         * 86 = CUIL 
         * 96 = DNI
         * 99 = Consumidor Final 
         **/
        $tipo_de_documento = 80;

        /**
         * Numero de documento del comprador (0 para consumidor final)
         **/
        $numero_de_documento = 30679928879;

        /**
         * Numero de factura
         **/
        $numero_de_factura = $last_voucher + 1;

        /**
         * Numero de CBU del cliente
         * Es requerido para realizar una factura de crédito electrónica
         **/
        $CBU = '1234567890123456789012';

        /**
         * Tipo de Transferencia
         * Es requerido para realizar una factura de crédito electrónica
         * SCA = 'TRANSFERENCIA AL SISTEMA DE CIRCULACION ABIERTA'
         * ADC = 'AGENTE DE DEPOSITO COLECTIVO'
         **/
        $transferencia = 'ADC';

        /**
         * Fecha de la factura en formato aaaa-mm-dd (hasta 10 dias antes y 10 dias despues)
         **/
        $fecha = date('Y-m-d');

        /**
         * Fecha de vencimiento del pago en formato aaaa-mm-dd
         **/
        $fecha_vencimiento_pago = date('Y-m-d');

        /**
         * Importe de la Factura
         **/
        $importe_total = 100000;

        /**
         * Los siguientes campos solo son obligatorios para los conceptos 2 y 3
         **/
        if ($concepto === 2 || $concepto === 3) {
            /**
             * Fecha de inicio de servicio en formato aaaammdd
             **/
            $fecha_servicio_desde = intval(date('Ymd'));

            /**
             * Fecha de fin de servicio en formato aaaammdd
             **/
            $fecha_servicio_hasta = intval(date('Ymd'));
        } else {
            $fecha_servicio_desde = null;
            $fecha_servicio_hasta = null;
        }

        $data = array(
            'CantReg' => 1, // Cantidad de facturas a registrar
            'PtoVta' => $punto_de_venta,
            'CbteTipo' => $tipo_de_factura,
            'Concepto' => $concepto,
            'DocTipo' => $tipo_de_documento,
            'DocNro' => $numero_de_documento,
            'CbteDesde' => $numero_de_factura,
            'CbteHasta' => $numero_de_factura,
            'CbteFch' => intval(str_replace('-', '', $fecha)),
            'FchServDesde' => $fecha_servicio_desde,
            'FchServHasta' => $fecha_servicio_hasta,
            'FchVtoPago' => intval(str_replace('-', '', $fecha_vencimiento_pago)),
            'ImpTotal' => $importe_total,
            'ImpTotConc' => 0, // Importe neto no gravado
            'ImpNeto' => $importe_total, // Importe neto
            'ImpOpEx' => 0, // Importe exento al IVA
            'ImpIVA' => 0, // Importe de IVA
            'ImpTrib' => 0, //Importe total de tributos
            'MonId' => 'PES', //Tipo de moneda usada en la factura ('PES' = pesos argentinos) 
            'MonCotiz' => 1, // Cotización de la moneda usada (1 para pesos argentinos)  
            'Opcionales' => array( // (Opcional) Alícuotas asociadas al comprobante
                array(
                    'Id' => 2101, // ID del campo opcion opcional (2101 = CBU)
                    'Valor' => $CBU
                ),
                array(
                    'Id' => 27, // ID del campo opcion opcional (27 = Transferencia)
                    'Valor' => $transferencia
                )
            ),
        );

        /** 
         * Creamos la Factura 
         **/
        $res = $afip->ElectronicBilling->CreateVoucher($data);

        /**
         * Mostramos por pantalla los datos de la nueva Factura 
         **/
        var_dump(
            array(
                'cae' => $res['CAE'], //CAE asignado a la Factura
                'vencimiento' => $res['CAEFchVto'] //Fecha de vencimiento del CAE
            )
        );
        break;

    case 'nota de credito A':
        /**
         * Numero del punto de venta
         **/
        $punto_de_venta = 1;

        /**
         * Tipo de Nota de Crédito
         **/
        $tipo_de_nota = 3; // 3 = Nota de Crédito A

        /**
         * Número de la ultima Nota de Crédito A
         **/
        $last_voucher = $afip->ElectronicBilling->GetLastVoucher($punto_de_venta, $tipo_de_nota);

        /**
         * Numero del punto de venta de la Factura 
         * asociada a la Nota de Crédito
         **/
        $punto_factura_asociada = 1;

        /**
         * Tipo de Factura asociada a la Nota de Crédito
         **/
        $tipo_factura_asociada = 1; // 1 = Factura A

        /**
         * Numero de Factura asociada a la Nota de Crédito
         **/
        $numero_factura_asociada = 1;

        /**
         * Concepto de la Nota de Crédito
         *
         * Opciones:
         *
         * 1 = Productos 
         * 2 = Servicios 
         * 3 = Productos y Servicios
         **/
        $concepto = 1;

        /**
         * Tipo de documento del comprador
         *
         * Opciones:
         *
         * 80 = CUIT 
         * 86 = CUIL 
         * 96 = DNI
         * 99 = Consumidor Final 
         **/
        $tipo_de_documento = 80;

        /**
         * Numero de documento del comprador (0 para consumidor final)
         **/
        $numero_de_documento = 33693450239;

        /**
         * Numero de Nota de Crédito
         **/
        $numero_de_nota = $last_voucher + 1;

        /**
         * Fecha de la Nota de Crédito en formato aaaa-mm-dd (hasta 10 dias antes y 10 dias despues)
         **/
        $fecha = date('Y-m-d');

        /**
         * Importe sujeto al IVA (sin icluir IVA)
         **/
        $importe_gravado = 100;

        /**
         * Importe exento al IVA
         **/
        $importe_exento_iva = 0;

        /**
         * Importe de IVA
         **/
        $importe_iva = 21;

        /**
         * Los siguientes campos solo son obligatorios para los conceptos 2 y 3
         **/
        if ($concepto === 2 || $concepto === 3) {
            /**
             * Fecha de inicio de servicio en formato aaaammdd
             **/
            $fecha_servicio_desde = intval(date('Ymd'));

            /**
             * Fecha de fin de servicio en formato aaaammdd
             **/
            $fecha_servicio_hasta = intval(date('Ymd'));

            /**
             * Fecha de vencimiento del pago en formato aaaammdd
             **/
            $fecha_vencimiento_pago = intval(date('Ymd'));
        } else {
            $fecha_servicio_desde = null;
            $fecha_servicio_hasta = null;
            $fecha_vencimiento_pago = null;
        }

        $data = array(
            'CantReg' => 1, // Cantidad de Notas de Crédito a registrar
            'PtoVta' => $punto_de_venta,
            'CbteTipo' => $tipo_de_nota,
            'Concepto' => $concepto,
            'DocTipo' => $tipo_de_documento,
            'DocNro' => $numero_de_documento,
            'CbteDesde' => $numero_de_nota,
            'CbteHasta' => $numero_de_nota,
            'CbteFch' => intval(str_replace('-', '', $fecha)),
            'FchServDesde' => $fecha_servicio_desde,
            'FchServHasta' => $fecha_servicio_hasta,
            'FchVtoPago' => $fecha_vencimiento_pago,
            'ImpTotal' => $importe_gravado + $importe_iva + $importe_exento_iva,
            'ImpTotConc' => 0, // Importe neto no gravado
            'ImpNeto' => $importe_gravado,
            'ImpOpEx' => $importe_exento_iva,
            'ImpIVA' => $importe_iva,
            'ImpTrib' => 0, //Importe total de tributos
            'MonId' => 'PES', //Tipo de moneda usada en la Nota de Crédito ('PES' = pesos argentinos) 
            'MonCotiz' => 1, // Cotización de la moneda usada (1 para pesos argentinos)
            'CbtesAsoc' => array( //Factura asociada
                array(
                    'Tipo' => $tipo_factura_asociada,
                    'PtoVta' => $punto_factura_asociada,
                    'Nro' => $numero_factura_asociada,
                )
            ),
            'Iva' => array( // Alícuotas asociadas a la Nota de Crédito
                array(
                    'Id' => 5, // Id del tipo de IVA (5 = 21%)
                    'BaseImp' => $importe_gravado,
                    'Importe' => $importe_iva
                )
            ),
        );

        /** 
         * Creamos la Nota de Crédito 
         **/
        $res = $afip->ElectronicBilling->CreateVoucher($data);

        /**
         * Mostramos por pantalla los datos de la nueva Nota de Crédito 
         **/
        var_dump(
            array(
                'cae' => $res['CAE'], //CAE asignado a la Nota de Crédito
                'vencimiento' => $res['CAEFchVto'] //Fecha de vencimiento del CAE
            )
        );
        break;

    case 'nota de credito B':
        /**
         * Numero del punto de venta
         **/
        $punto_de_venta = 1;

        /**
         * Tipo de Nota de Crédito
         **/
        $tipo_de_nota = 8; // 8 = Nota de Crédito B

        /**
         * Número de la ultima Nota de Crédito B
         **/
        $last_voucher = $afip->ElectronicBilling->GetLastVoucher($punto_de_venta, $tipo_de_nota);

        /**
         * Numero del punto de venta de la Factura 
         * asociada a la Nota de Crédito
         **/
        $punto_factura_asociada = 1;

        /**
         * Tipo de Factura asociada a la Nota de Crédito
         **/
        $tipo_factura_asociada = 6; // 6 = Factura B

        /**
         * Numero de Factura asociada a la Nota de Crédito
         **/
        $numero_factura_asociada = 1;

        /**
         * Concepto de la Nota de Crédito
         *
         * Opciones:
         *
         * 1 = Productos 
         * 2 = Servicios 
         * 3 = Productos y Servicios
         **/
        $concepto = 1;

        /**
         * Tipo de documento del comprador
         *
         * Opciones:
         *
         * 80 = CUIT 
         * 86 = CUIL 
         * 96 = DNI
         * 99 = Consumidor Final 
         **/
        $tipo_de_documento = 99;

        /**
         * Numero de documento del comprador (0 para consumidor final)
         **/
        $numero_de_documento = 0;

        /**
         * Numero de Nota de Crédito
         **/
        $numero_de_nota = $last_voucher + 1;

        /**
         * Fecha de la Nota de Crédito en formato aaaa-mm-dd (hasta 10 dias antes y 10 dias despues)
         **/
        $fecha = date('Y-m-d');

        /**
         * Importe sujeto al IVA (sin icluir IVA)
         **/
        $importe_gravado = 100;

        /**
         * Importe exento al IVA
         **/
        $importe_exento_iva = 0;

        /**
         * Importe de IVA
         **/
        $importe_iva = 21;

        /**
         * Los siguientes campos solo son obligatorios para los conceptos 2 y 3
         **/
        if ($concepto === 2 || $concepto === 3) {
            /**
             * Fecha de inicio de servicio en formato aaaammdd
             **/
            $fecha_servicio_desde = intval(date('Ymd'));

            /**
             * Fecha de fin de servicio en formato aaaammdd
             **/
            $fecha_servicio_hasta = intval(date('Ymd'));

            /**
             * Fecha de vencimiento del pago en formato aaaammdd
             **/
            $fecha_vencimiento_pago = intval(date('Ymd'));
        } else {
            $fecha_servicio_desde = null;
            $fecha_servicio_hasta = null;
            $fecha_vencimiento_pago = null;
        }


        $data = array(
            'CantReg' => 1, // Cantidad de Notas de Crédito a registrar
            'PtoVta' => $punto_de_venta,
            'CbteTipo' => $tipo_de_nota,
            'Concepto' => $concepto,
            'DocTipo' => $tipo_de_documento,
            'DocNro' => $numero_de_documento,
            'CbteDesde' => $numero_de_nota,
            'CbteHasta' => $numero_de_nota,
            'CbteFch' => intval(str_replace('-', '', $fecha)),
            'FchServDesde' => $fecha_servicio_desde,
            'FchServHasta' => $fecha_servicio_hasta,
            'FchVtoPago' => $fecha_vencimiento_pago,
            'ImpTotal' => $importe_gravado + $importe_iva + $importe_exento_iva,
            'ImpTotConc' => 0, // Importe neto no gravado
            'ImpNeto' => $importe_gravado,
            'ImpOpEx' => $importe_exento_iva,
            'ImpIVA' => $importe_iva,
            'ImpTrib' => 0, //Importe total de tributos
            'MonId' => 'PES', //Tipo de moneda usada en la Nota de Crédito ('PES' = pesos argentinos) 
            'MonCotiz' => 1, // Cotización de la moneda usada (1 para pesos argentinos)  
            'CbtesAsoc' => array( //Factura asociada
                array(
                    'Tipo' => $tipo_factura_asociada,
                    'PtoVta' => $punto_factura_asociada,
                    'Nro' => $numero_factura_asociada,
                )
            ),
            'Iva' => array(// Alícuotas asociadas a la Nota de Crédito
                array(
                    'Id' => 5, // Id del tipo de IVA (5 = 21%)
                    'BaseImp' => $importe_gravado,
                    'Importe' => $importe_iva
                )
            ),
        );

        /** 
         * Creamos la Nota de Crédito 
         **/
        $res = $afip->ElectronicBilling->CreateVoucher($data);

        /**
         * Mostramos por pantalla los datos de la nueva Nota de Crédito 
         **/
        var_dump(
            array(
                'cae' => $res['CAE'], //CAE asignado a la Nota de Crédito
                'vencimiento' => $res['CAEFchVto'] //Fecha de vencimiento del CAE
            )
        );
        break;
    case 'nota de credito C':
        /**
         * Numero del punto de venta
         **/
        $punto_de_venta = 1;

        /**
         * Tipo de Nota de Crédito
         **/
        $tipo_de_nota = 13; // 13 = Nota de Crédito C

        /**
         * Número de la ultima Nota de Crédito C
         **/
        $last_voucher = $afip->ElectronicBilling->GetLastVoucher($punto_de_venta, $tipo_de_nota);

        /**
         * Numero del punto de venta de la Factura 
         * asociada a la Nota de Crédito
         **/
        $punto_factura_asociada = 1;

        /**
         * Tipo de Factura asociada a la Nota de Crédito
         **/
        $tipo_factura_asociada = 11; // 11 = Factura C

        /**
         * Numero de Factura asociada a la Nota de Crédito
         **/
        $numero_factura_asociada = 1;

        /**
         * Concepto de la Nota de Crédito
         *
         * Opciones:
         *
         * 1 = Productos 
         * 2 = Servicios 
         * 3 = Productos y Servicios
         **/
        $concepto = 1;

        /**
         * Tipo de documento del comprador
         *
         * Opciones:
         *
         * 80 = CUIT 
         * 86 = CUIL 
         * 96 = DNI
         * 99 = Consumidor Final 
         **/
        $tipo_de_documento = 80;

        /**
         * Numero de documento del comprador (0 para consumidor final)
         **/
        $numero_de_documento = 33693450239;

        /**
         * Numero de comprobante
         **/
        $numero_de_nota = $last_voucher + 1;

        /**
         * Fecha de la Nota de Crédito en formato aaaa-mm-dd (hasta 10 dias antes y 10 dias despues)
         **/
        $fecha = date('Y-m-d');

        /**
         * Importe de la Nota de Crédito
         **/
        $importe_total = 100;

        /**
         * Los siguientes campos solo son obligatorios para los conceptos 2 y 3
         **/
        if ($concepto === 2 || $concepto === 3) {
            /**
             * Fecha de inicio de servicio en formato aaaammdd
             **/
            $fecha_servicio_desde = intval(date('Ymd'));

            /**
             * Fecha de fin de servicio en formato aaaammdd
             **/
            $fecha_servicio_hasta = intval(date('Ymd'));

            /**
             * Fecha de vencimiento del pago en formato aaaammdd
             **/
            $fecha_vencimiento_pago = intval(date('Ymd'));
        } else {
            $fecha_servicio_desde = null;
            $fecha_servicio_hasta = null;
            $fecha_vencimiento_pago = null;
        }


        $data = array(
            'CantReg' => 1, // Cantidad de Notas de Crédito a registrar
            'PtoVta' => $punto_de_venta,
            'CbteTipo' => $tipo_de_nota,
            'Concepto' => $concepto,
            'DocTipo' => $tipo_de_documento,
            'DocNro' => $numero_de_documento,
            'CbteDesde' => $numero_de_nota,
            'CbteHasta' => $numero_de_nota,
            'CbteFch' => intval(str_replace('-', '', $fecha)),
            'FchServDesde' => $fecha_servicio_desde,
            'FchServHasta' => $fecha_servicio_hasta,
            'FchVtoPago' => $fecha_vencimiento_pago,
            'ImpTotal' => $importe_total,
            'ImpTotConc' => 0, // Importe neto no gravado
            'ImpNeto' => $importe_total, // Importe neto
            'ImpOpEx' => 0, // Importe exento al IVA
            'ImpIVA' => 0, // Importe de IVA
            'ImpTrib' => 0, //Importe total de tributos
            'MonId' => 'PES', //Tipo de moneda usada en el comprobante ('PES' = pesos argentinos) 
            'MonCotiz' => 1, // Cotización de la moneda usada (1 para pesos argentinos)  
            'CbtesAsoc' => array( //Factura asociada
                    array(
                        'Tipo' => $tipo_factura_asociada,
                        'PtoVta' => $punto_factura_asociada,
                        'Nro' => $numero_factura_asociada,
                    )
                )
        );

        /** 
         * Creamos la Nota de Crédito 
         **/
        $res = $afip->ElectronicBilling->CreateVoucher($data);

        /**
         * Mostramos por pantalla los datos de la nueva Nota de Crédito 
         **/
        var_dump(
            array(
                'cae' => $res['CAE'], //CAE asignado a la Nota de Crédito
                'vencimiento' => $res['CAEFchVto'] //Fecha de vencimiento del CAE
            )
        );
        break;
    default:
        # code...
        break;
}