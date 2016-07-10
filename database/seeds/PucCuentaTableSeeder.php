<?php

use Illuminate\Database\Seeder;

class PucCuentaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('puc_cuenta')->delete();
        
        \DB::table('puc_cuenta')->insert(array (
            0 => 
            array (
                'id' => 1,
                'codigo' => '1105',
                'nombre' => 'CAJA',
                'descripcion' => 'Registra la existencia en dinero efectivo o en cheques con que cuenta el ente económico, tanto en moneda nacional como extranjera, disponible en forma inmediata.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'codigo' => '1110',
                'nombre' => 'BANCOS',
                'descripcion' => 'Registra el valor de los depósitos constituidos por el ente económico en moneda nacional y extranjera, en bancos tanto del país como del exterior.

Para el caso de las cuentas corrientes bancarias poseídas en el exterior su monto en moneda nacional se obtendrá de la conversión a la tasa de cambio representativa del mercado.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'codigo' => '1115',
                'nombre' => 'REMESAS EN TRANSITO',
                'descripcion' => 'Registra el valor de los cheques sobre otras plazas nacionales o del exterior que han sido negociados por el ente económico, los cuales se encuentran pendientes de confirmación.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'codigo' => '1120',
                'nombre' => 'CUENTAS DE AHORRO',
                'descripcion' => 'Registra la existencia de fondos a la vista o a término constituidos por el ente económico en las diferentes entidades financieras, las cuales generalmente producen algún tipo de rendimiento.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'codigo' => '1125',
                'nombre' => 'FONDOS',
                'descripcion' => 'Registra el valor de los dineros del ente económico en poder de funcionarios del mismo que son manejados en efectivo o en cuentas corrientes bancarias y están destinados para atender fines especiales o cierta clase de gastos que requieren un tratamiento especial, dadas las necesidades urgentes de la prestación de servicios o adquisición de elementos.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'codigo' => '1205',
                'nombre' => 'ACCIONES ',
                'descripcion' => 'Registra el costo histórico de las inversiones realizadas por el ente económico en sociedades por acciones y/o asimiladas, el cual incluye las sumas incurridas directamente en su adquisición.

Cuando el valor de mercado o de realización sea inferior al costo histórico, éste debe ajustarse mediante una provisión con cargo a los resultados del ejercicio en el cual se presentó la pérdida del valor y si es superior mediante valorización acreditada a la cuenta 3805 -de inversiones-.

Para estos efectos se entiende por valor de mercado o de realización el promedio de cotización representativa en las bolsas de valores en el último mes y, a falta de éste, su valor intrínseco, para lo cual se utilizarán estados financieros certificados.

El ente económico matriz o controlante debe aplicar el método de participación, cuando se presenten los presupuestos básicos para su aplicación.

El tratamiento contable para cuando sea actividad principal o secundaria deberá obedecer a lo expuesto en la descripción del grupo 12 -inversiones-.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 2,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'codigo' => '1210',
                'nombre' => 'CUOTAS O PARTES DE INTERES SOCIAL',
                'descripcion' => 'Registra el costo histórico de las inversiones realizadas por el ente económico en sociedades de responsabilidad limitada y/o asimiladas, el cual incluye las sumas incurridas directamente en su adquisición.

Cuando el valor de mercado o de realización sea inferior al costo histórico, éste debe ajustarse mediante una provisión con cargo a los resultados del ejercicio en el cual se presentó la pérdida del valor y si es superior mediante valorización acreditada a la cuenta 3805 -de inversiones-.

Para estos efectos se entiende por valor de mercado o de realización su valor intrínseco, para lo cual se utilizarán estados financieros certificados.

El ente económico matriz o controlante debe aplicar el método de participación, cuando se presenten los presupuestos básicos para su aplicación.

El tratamiento contable para cuando sea actividad principal o secundaria, según sea el caso, deberá obedecer a lo expuesto en la descripción del grupo 12 -inversiones-.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 2,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'codigo' => '1215',
                'nombre' => 'BONOS',
                'descripcion' => 'Registra el valor de las inversiones hechas por el ente económico en bonos, los cuales son títulos valores que incorporan una parte alícuota de un crédito colectivo constituido a cargo de una sociedad.

El tratamiento contable para cuando sea actividad principal o secundaria, así como para el descuento por amortizar o prima por amortizar, según sea el caso, deberá obedecer a lo expuesto en la descripción del grupo 12 -inversiones-.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 2,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'codigo' => '1220',
                'nombre' => 'CEDULAS',
                'descripcion' => 'Registra el valor de las cédulas emitidas por el Banco Central Hipotecario u otras sociedades de capitalización autorizadas para tal fin.

El tratamiento contable para cuando sea actividad principal o secundaria, así como para el descuento por amortizar o prima por amortizar, según sea el caso, deberá obedecer a lo expuesto en la descripción del grupo 12 -inversiones-.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 2,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'codigo' => '1225',
                'nombre' => 'CERTIFICADOS',
                'descripcion' => 'Registra el monto de las inversiones realizadas por el ente económico en certificados emitidos por entidades legalmente autorizadas.

El tratamiento contable para cuando sea actividad principal o secundaria, así como para el descuento por amortizar o prima por amortizar, según sea el caso, deberá obedecer a lo expuesto en la descripción del grupo 12 -inversiones-.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 2,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'codigo' => '1230',
                'nombre' => 'PAPELES COMERCIALES',
                'descripcion' => 'Registra el monto de la inversión realizada por el ente económico en valores de contenido crediticio emitidos por entes comerciales, industriales y de servicios, sometidos a la inspección y vigilancia por parte de entidades del Estado, cuyo objetivo es la financiación del capital de trabajo.

El tratamiento contable para cuando sea actividad principal o secundaria, así como para el descuento por amortizar o prima por amortizar, según sea el caso, deberá obedecer a lo expuesto en la descripción del grupo 12 -inversiones-.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 2,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'codigo' => '1235',
                'nombre' => 'TITULOS',
                'descripcion' => 'Registra el valor de la inversión realizada por el ente económico en los denominados genéricamente "títulos", emitidos por el Gobierno Nacional por intermedio del Banco de la República, otra entidad gubernamental o financiera, debidamente autorizada.

El tratamiento contable para cuando sea actividad principal o secundaria, así como para el descuento por amortizar o prima por amortizar, según sea el caso, deberá obedecer a lo expuesto en la descripción del grupo 12 -inversiones-.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 2,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'codigo' => '1240',
                'nombre' => 'ACEPTACIONES BANCARIAS O FINANCIERAS',
                'descripcion' => 'Registra el valor de la inversión realizada por el ente económico en instrumentos de financiación denominados aceptaciones bancarias o financieras.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 2,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'codigo' => '1245',
                'nombre' => 'DERECHOS FIDUCIARIOS',
                'descripcion' => 'Registra el valor de los bienes entregados con el propósito de cumplir una finalidad específica, bien sea en beneficio del fideicomitente o de un tercero en calidad de fideicomiso de inversión.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 2,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 31,
                'codigo' => '1345',
                'nombre' => 'INGRESOS POR COBRAR',
                'descripcion' => 'Registra los valores devengados por el ente económico pendientes de cobro originados en el desarrollo de las operaciones cualquiera que sea su denominación.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 32,
                'codigo' => '1350',
                'nombre' => 'RETENCION SOBRE CONTRATOS',
            'descripcion' => 'Registra el valor de los descuentos efectuados por otro ente económico sobre pagos parciales (cuentas de cobro) para garantizar el pago de salarios, estabilidad de obra, garantías y otras obligaciones producto de la relación contractual.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 33,
                'codigo' => '1355',
                'nombre' => 'ANTICIPO DE IMPUESTOS Y CONTRIBUCIONES O SALDOS A FAVOR',
                'descripcion' => 'Registra los saldos a cargo de entidades gubernamentales y a favor del ente económico, por concepto de anticipos de impuestos y los originados en liquidaciones de declaraciones tributarias, contribuciones y tasas para ser solicitados en devolución o compensación con liquidaciones futuras.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 219,
                'codigo' => '3705',
                'nombre' => 'UTILIDADES ACUMULADAS ',
                'descripcion' => 'no registra una descripcion',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 25,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 15,
                'codigo' => '1250',
            'nombre' => 'DERECHOS DE RECOMPRA DE INVERSIONES NEGOCIADAS(REPOS)',
                'descripcion' => 'Registra las inversiones restringidas que resultan de la transferencia de las inversiones negociadas y representa la "garantía colateral" de la cuenta 2135 -compromisos de recompra de inversiones negociadas-.

Corresponde a la negociación por cuenta propia de inversiones transadas bajo la modalidad de venta de inversiones con pacto de recompra a la vista o a término.

Estas operaciones no deben ser tratadas como ventas en "firme", puesto que deben tomarse en su verdad material y no la puramente formal, toda vez que debido al pacto tácito o expreso, existe la certeza del cumplimiento del pacto de recompra (vendedor) y retroventa (comprador). En caso de incumplimiento del pacto por una de las partes o de ambas, se estará frente a un evento diferente que generará derechos y obligaciones propias a tal circunstancia. En este evento, a la venta con pacto de recompra se le debe dar el tratamiento de venta en "firme".

Por tanto, estas operaciones serán tratadas como "compromisos de recompra o retroventa", y en consecuencia no suspenderán la causación y/o amortización del reconocimiento de los correspondientes ingresos (intereses y/o descuentos), ni la asignación de los gastos (prima) de la inversión.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 2,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 16,
                'codigo' => '1255',
                'nombre' => 'OBLIGATORIAS',
                'descripcion' => 'Registra el monto de las inversiones de carácter forzoso realizadas por el ente económico en cumplimiento de exigencias legales emanadas de las autoridades pertinentes.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 2,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 17,
                'codigo' => '1260',
                'nombre' => 'CUENTAS EN PARTICIPACION',
                'descripcion' => 'Registra el valor del aporte efectuado por el partícipe, en desarrollo de contratos de cuentas en participación suscritos y desarrollados conforme a lo previsto en la legislación comercial vigente.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 2,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 18,
                'codigo' => '1295',
                'nombre' => 'OTRAS INVERSIONES',
                'descripcion' => 'Registra el costo de las inversiones que el ente económico ha realizado en valores diferentes a los descritos anteriormente dentro del grupo 12 -inversiones-.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 2,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 19,
                'codigo' => '1299',
                'nombre' => 'PROVISIONES',
                'descripcion' => 'Registra los valores provisionados por el ente económico, con cargo a las cuentas de resultado, con el fin de cubrir la diferencia resultante entre el costo de las inversiones y el valor de mercado o intrínseco, según sea el caso. Es una cuenta de valuación del activo, de naturaleza crédito.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 2,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 20,
                'codigo' => '1305',
                'nombre' => 'CLIENTES',
                'descripcion' => 'Registra los valores a favor del ente económico y a cargo de clientes nacionales y/o extranjeros de cualquier naturaleza, por concepto de ventas de mercancías, productos terminados, servicios y contratos realizados en desarrollo del objeto social, así como la financiación de los mismos.

Para el caso de las sociedades administradoras de consorcios comerciales, se deben llevar por separado tanto los grupos cerrados como vigentes, entendiéndose por grupos cerrados aquellos en los cuales el bien o servicio objeto del contrato se ha adjudicado en su totalidad a los integrantes del grupo y por grupos vigentes aquellos en los cuales no ha sido adjudicada la totalidad de los bienes o servicios.

Debe presentarse por separado cada uno de los rubros que conforman la subcuenta 130515 -deudores del sistema-, a saber: cuota neta y de administración, por cada grupo de suscriptores.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 21,
                'codigo' => '1310',
                'nombre' => 'CUENTAS CORRIENTES COMERCIALES',
                'descripcion' => 'Registra el valor de las operaciones comerciales celebradas entre dos entes económicos, reguladas por las normas legales vigentes. Esta modalidad consiste en un negocio jurídico que tiene por características ser bilateral, oneroso, conmutativo y de ejecución sucesiva, para el cual se acuerdan anotar y compensar en cuenta abierta por debe y haber sus eventuales créditos recíprocos y se establecen condiciones de exigibilidad y disponibilidad del saldo resultante de la compensación progresiva operada.

Las remesas pueden consistir en mercaderías, dineros, títulos valores, comisiones, créditos, etc., las cuales han de convertirse en partidas de la cuenta.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 22,
                'codigo' => '1315',
                'nombre' => 'CUENTAS POR COBRAR A CASA MATRIZ',
                'descripcion' => 'Registra el valor de las deudas a favor del ente económico, y a cargo de la casa matriz originadas en la facturación, cobro o liquidación de los ingresos u operaciones directamente realizadas con ésta, sin que se haya celebrado contrato de cuenta corriente, en cuyo caso se deberá registrar en la cuenta 1310 -cuentas corrientes comerciales-.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 142,
                'codigo' => '2412',
                'nombre' => 'DE INDUSTRIA Y COMERCIO',
                'descripcion' => 'Registra el valor adeudado por el gravamen establecido sobre las actividades industriales comerciales y de servicios, en favor de cada uno de los distritos y municipios donde ellas se desarrollan, según la liquidación privada.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 13,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 23,
                'codigo' => '1320',
                'nombre' => 'CUENTAS POR COBRAR A VINCULADOS ECONOMICOS',
                'descripcion' => 'Registra el valor a cargo de otros entes vinculados económicamente por préstamos o transacciones en dinero o en especie, así como los pagos que se realizan por cuenta de éstos.

Se considera que hay vinculación cuando entre dos o más entes económicos existen intereses económicos, financieros o administrativos, comunes o recíprocos, así como cualquier situación de control o dependencia.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 24,
                'codigo' => '1323',
                'nombre' => 'CUENTAS POR COBRAR A DIRECTORES',
                'descripcion' => 'Registra el valor a cargo de los directores del ente económico sin vínculo laboral por concepto de préstamos, así como los pagos que se realizan por cuenta de éstos, de conformidad con las normas estatutarias y legales vigentes.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 25,
                'codigo' => '1325',
                'nombre' => 'CUENTAS POR COBRAR A SOCIOS Y ACCIONISTAS',
                'descripcion' => 'Registra los valores entregados en dinero o en especie a los socios o accionistas y los pagos efectuados por el ente económico a terceros por cuenta de éstos, de conformidad con las normas legales vigentes.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 26,
                'codigo' => '1328',
                'nombre' => 'APORTES POR COBRAR',
                'descripcion' => 'Registra el valor de los aportes gubernamentales asignados en el presupuesto nacional y que se causan mensualmente a favor del ente económico.

Esta cuenta es de uso exclusivo de las sociedades de economía mixta y de empresas industriales y comerciales del Estado.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 27,
                'codigo' => '1330',
                'nombre' => 'ANTICIPOS Y AVANCES',
                'descripcion' => 'Registra el valor de los adelantos efectuados en dinero o en especie por el ente económico a personas naturales o jurídicas, con el fin de recibir beneficios o contraprestación futura de acuerdo con las condiciones pactadas, incluye conceptos tales como anticipos a proveedores, a contratistas, a trabajadores, a agentes de aduana y a concesionarios.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 28,
                'codigo' => '1332',
                'nombre' => 'CUENTAS DE OPERACION CONJUNTA',
                'descripcion' => 'Registra esta cuenta los avances entregados por los socios no operadores involucrados en la denominada "operación conjunta", en desarrollo de los contratos de asociación y participación de riesgo, que celebren entes económicos, o uno o más de éstos y la Nación, para la exploración y explotación de recursos naturales renovables y no renovables, suscritos conforme a las normas legales vigentes.

Esta cuenta es de uso exclusivo de los entes económicos dedicados a la exploración y explotación de recursos naturales renovables y no renovables.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => 29,
                'codigo' => '1335',
                'nombre' => 'DEPOSITOS',
                'descripcion' => 'Registra el valor de los dineros entregados por el ente económico con carácter transitorio como garantía del cumplimiento de contratos, importaciones, servicios, responsabilidades en custodia de bienes, juicios ejecutivos y demás obligaciones contraídas con personas naturales o jurídicas.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => 30,
                'codigo' => '1340',
                'nombre' => 'PROMESAS DE COMPRA VENTA',
                'descripcion' => 'Registra los valores entregados por el ente económico a promitentes vendedores por la adquisición de bienes mediante promesa escrita.

Una vez perfeccionada con el lleno de las formalidades del caso, el valor del bien adquirido se registrará en la respectiva cuenta activa conforme a su naturaleza.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'id' => 34,
                'codigo' => '1360',
                'nombre' => 'RECLAMACIONES',
                'descripcion' => 'Registra el valor de las indemnizaciones por recibir de las compañías aseguradoras a favor del ente económico y reclamos por cobrar a transportadores, entre otros.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'id' => 35,
                'codigo' => '1365',
                'nombre' => 'CUENTAS POR COBRAR A TRABAJADORES',
                'descripcion' => 'Registra los derechos a favor del ente económico, originados en créditos otorgados al personal con vínculo laboral, así como los valores a cargo de éstos por conceptos tales como faltantes en caja o inventarios.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'id' => 36,
                'codigo' => '1370',
                'nombre' => 'PRESTAMOS A PARTICULARES',
                'descripcion' => 'Registra el valor de los dineros entregados a terceros por el ente económico, en calidad de préstamos en desarrollo de sus operaciones normales.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            38 => 
            array (
                'id' => 37,
                'codigo' => '1380',
                'nombre' => 'DEUDORES VARIOS',
                'descripcion' => 'Registra los valores a favor del ente económico y a cargo de deudores diferentes a los enunciados anteriormente, tales como: depositarios de ganado en participación, comisionistas de bolsas, fondos de inversión, cuentas por cobrar de terceros y pagos por cuenta de terceros.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            39 => 
            array (
                'id' => 38,
                'codigo' => '1385',
                'nombre' => 'DERECHOS DE RECOMPRA DE CARTERA NEGOCIADA',
                'descripcion' => 'Registra los créditos restringidos que resultan de la transferencia de cartera de créditos negociada y representa la "garantía colateral" de la cuenta 2140 -compromisos de recompra de cartera negociada-.

Corresponde a la negociación por cuenta propia de cartera de créditos, transada bajo la modalidad de ventas de cartera con pacto de recompra a la vista o a término.

Estas operaciones no deben ser tratadas como ventas en "firme" puesto que deben tomarse en su verdad material y no la puramente formal, toda vez que debido al pacto tácito o expreso, existe la certeza del cumplimiento del pacto de recompra (vendedor) y retroventa (comprador). En caso del incumplimiento del pacto por una de las partes o de ambas, se estará frente a un evento diferente que generará derechos y obligaciones propias a tal circunstancia.

En este caso, a la venta con pacto de compra se debe dar el tratamiento de venta en "firme".',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            40 => 
            array (
                'id' => 39,
                'codigo' => '1390',
                'nombre' => 'DEUDAS DE DIFICIL COBRO',
                'descripcion' => 'Registra el valor de las deudas a favor del ente económico que no han sido atendidas oportunamente, bien sea por dificultades financieras del deudor u otra causa cualquiera. Para darle tal tratamiento debe encontrarse vencido el plazo estipulado y su cancelación o castigo sólo procede una vez se hayan agotado las gestiones de cobro pertinentes.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            41 => 
            array (
                'id' => 40,
                'codigo' => '1399',
                'nombre' => 'PROVISIONES',
                'descripcion' => 'Registra los montos provisionados por el ente económico para cubrir eventuales pérdidas de créditos, como resultado del análisis efectuado a cada uno de los rubros que conforman el grupo deudores. Es una cuenta de valuación de activo, de naturaleza crédito.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            42 => 
            array (
                'id' => 41,
                'codigo' => '1405',
                'nombre' => 'MATERIAS PRIMAS',
                'descripcion' => 'Registra el valor de los elementos básicos adquiridos a nivel nacional o internacional, para uso en el proceso de fabricación o producción y que requieren procesamiento adicional.

El costo lo constituirá el monto total del valor del artículo más los cargos incurridos hasta colocarlos en bodega para ser utilizados.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 4,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            43 => 
            array (
                'id' => 42,
                'codigo' => '1410',
                'nombre' => 'PRODUCTOS EN PROCESO',
                'descripcion' => 'Registra el costo de los artículos semielaborados, es decir que poseen un cierto grado de terminación y para lo cual se ha incurrido en costos de materiales, mano de obra y costos indirectos de fabricación requiriendo procesos adicionales para ser convertidos en productos terminados.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 4,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            44 => 
            array (
                'id' => 43,
                'codigo' => '1415',
                'nombre' => 'OBRAS DE CONSTRUCCION EN CURSO',
                'descripcion' => 'Registra los diferentes componentes del costo como son: materiales, mano de obra y demás costos de construcción incurridos para el desarrollo de cada obra o frente de trabajo, hasta su traslado a la cuenta 1440 -bienes raíces para la venta-.

Registra también los componentes del costo de las obras en ejecución de propiedad del ente económico, que contrate bajo la modalidad de administración delegada.

Esta cuenta es de uso exclusivo del ente económico dedicado a la actividad de la construcción.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 4,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            45 => 
            array (
                'id' => 44,
                'codigo' => '1417',
                'nombre' => 'OBRAS DE URBANISMO',
                'descripcion' => 'Registra el valor del presupuesto de obra aprobado por la autoridad competente, o el costo real de las obras de urbanismo, en el evento de no haber elaborado dicho presupuesto.

Esta cuenta es de uso exclusivo de los entes económicos dedicados a actividades de urbanismo y construcción.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 4,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            46 => 
            array (
                'id' => 45,
                'codigo' => '1420',
                'nombre' => 'CONTRATOS EN EJECUCION',
                'descripcion' => 'Registra los diferentes componentes del costo como son: materiales, mano de obra y demás costos de producción o manufactura, incurridos por el ente económico en trabajos que esté ejecutando, así como de construcciones diferentes a bienes raíces para la venta, en cuyo caso se llevarán a la cuenta 1415 -obras de construcción en curso-.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 4,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            47 => 
            array (
                'id' => 46,
                'codigo' => '1425',
                'nombre' => 'CULTIVOS EN DESARROLLO',
                'descripcion' => 'Registra los costos en que incurre el ente económico en los procesos de siembra, desarrollo y recolección de productos agropecuarios y/o piscícolas, los cuales son absorbidos en su totalidad, toda vez que su período productivo termina con la primera cosecha.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 4,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            48 => 
            array (
                'id' => 47,
                'codigo' => '1428',
                'nombre' => 'PLANTACIONES AGRICOLAS',
                'descripcion' => 'Registra los costos amortizables en que incurre el ente económico en los procesos de adecuación, preparación, siembra y cultivo, toda vez que su producción se efectúa en varias cosechas y cuyo levantamiento o período productivo tiene una duración de 1 a 2 años.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 4,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            49 => 
            array (
                'id' => 48,
                'codigo' => '1430',
                'nombre' => 'PRODUCTOS TERMINADOS',
                'descripcion' => 'Registra el valor de las existencias de los diferentes bienes cosechados, extraídos o fabricados parcial o totalmente por el ente económico y que se encuentran disponibles para la comercialización.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 4,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            50 => 
            array (
                'id' => 49,
                'codigo' => '1435',
                'nombre' => 'MERCANCIAS NO FABRICADAS POR LA EMPRESA',
                'descripcion' => 'Registra el valor de los bienes adquiridos para la venta por el ente económico que no sufren ningún proceso de transformación o adición y se encuentran disponibles para su enajenación.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 4,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            51 => 
            array (
                'id' => 50,
                'codigo' => '1440',
                'nombre' => 'BIENES RAICES PARA LA VENTA',
                'descripcion' => 'Registra el valor de los terrenos y construcciones que tiene el ente económico totalmente adecuados y terminados y se encuentran disponibles para la venta, tales como terrenos, casas, apartamentos, bodegas, locales, edificios, oficinas, parqueaderos, garajes y bóvedas. El costo del terreno se deberá registrar por separado del costo de la respectiva construcción.

Cuenta de uso exclusivo del ente económico dedicado a las actividades de construcción y/o venta de bienes raíces.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 4,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            52 => 
            array (
                'id' => 51,
                'codigo' => '1445',
                'nombre' => 'SEMOVIENTES',
                'descripcion' => 'Registra los costos y demás cargos capitalizables en que incurre el ente económico para la adquisición de animales, tanto de especies mayores como menores, que están destinados para la venta, cría, levante o ceba.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 4,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            53 => 
            array (
                'id' => 52,
                'codigo' => '1450',
                'nombre' => 'TERRENOS',
                'descripcion' => 'Registra los costos y demás cargos capitalizables en que incurre el ente económico para la adquisición de terrenos que están destinados para la venta, o construcciones para la venta.

Cuenta de uso exclusivo del ente económico dedicado a las actividades de construcción y/o venta de bienes raíces.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 4,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            54 => 
            array (
                'id' => 70,
                'codigo' => '1552',
                'nombre' => 'FLOTA Y EQUIPO FERREO',
                'descripcion' => 'Registra los costos en que incurre el ente económico en la adquisición e instalación de los equipos férreos para ser utilizados en desarrollo de sus actividades.

La diferencia resultante con el precio de enajenación se registrará en la cuenta de ingresos (gastos) no operacionales.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            55 => 
            array (
                'id' => 53,
                'codigo' => '1455',
                'nombre' => 'MATERIALES, REPUESTOS Y ACCESORIOS',
                'descripcion' => 'Registra el valor de los elementos que han sido adquiridos por el ente económico para consumir en la producción de bienes fabricados para la venta o en la prestación de servicios en todas y cada una de las operaciones realizadas en su normal funcionamiento. Comprende conceptos tales como elementos necesarios para mantenimiento y reparaciones, herramientas e implementos de trabajo, repuestos para maquinaria y equipo de producción.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 4,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            56 => 
            array (
                'id' => 54,
                'codigo' => '1460',
                'nombre' => 'ENVASES Y EMPAQUES',
                'descripcion' => 'Registra los elementos y materiales adquiridos para ser usados en el empaque o envase de productos tales como cartones, papeles, materiales para tapas, frascos y jarros.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 4,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            57 => 
            array (
                'id' => 55,
                'codigo' => '1465',
                'nombre' => 'INVENTARIOS EN TRANSITO',
                'descripcion' => 'Se registra en esta cuenta el valor de las erogaciones efectuadas por el ente económico tanto para las importaciones, como para las compras realizadas en el país, desde el momento en que se inicia el trámite hasta cuando ingresan a la bodega como adquisiciones del período, tales como materias primas, suministros y repuestos, materiales, mercancías y subproductos.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 4,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            58 => 
            array (
                'id' => 56,
                'codigo' => '1499',
                'nombre' => 'PROVISIONES',
                'descripcion' => 'Registra los montos provisionados por el ente económico, para cubrir eventuales pérdidas de sus inventarios, por obsolescencia, faltantes, deterioro o pérdida de los mismos, como resultado del análisis efectuado a cada uno de los rubros que conforman el grupo inventarios. Es una cuenta de valuación del activo, de naturaleza crédito.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 4,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            59 => 
            array (
                'id' => 57,
                'codigo' => '1504',
                'nombre' => 'TERRENOS',
                'descripcion' => 'Registra el valor de los predios donde están construidas las diferentes edificaciones de propiedad del ente económico, así como los destinados a futuras ampliaciones o construcciones para el uso o servicio del mismo.

La diferencia resultante con el precio de enajenación se registrará en las cuentas de ingresos (gastos) no operacionales.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            60 => 
            array (
                'id' => 58,
                'codigo' => '1506',
                'nombre' => 'MATERIALES PROYECTOS PETROLEROS',
                'descripcion' => 'Registra el valor de los materiales adquiridos para desarrollar actividades de exploración y explotación y que harán parte de proyectos susceptibles de capitalización; tales como tuberías, cabezales de pozos, bombas y otras facilidades para adecuación del campo petrolero.

Esta cuenta es de uso exclusivo de los entes económicos que desarrollan actividades de exploración y explotación de hidrocarburos.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            61 => 
            array (
                'id' => 59,
                'codigo' => '1508',
                'nombre' => 'CONSTRUCCIONES EN CURSO',
                'descripcion' => 'Registra los costos incurridos por el ente económico en la construcción o ampliación de edificaciones destinadas a oficinas, locales, bodegas, plantas de operación; así como de otras obras en proceso, que serán utilizadas en las labores operativas o administrativas. Una vez terminadas dichas obras, sus saldos se trasladarán a las cuentas correspondientes.

El costo incluye los desembolsos por materiales, mano de obra, licencias, honorarios profesionales, costos financieros e interventoría y otros costos efectuados hasta el momento en que el bien quede adecuado para su uso.

Mientras las obras se encuentren en proceso no deben ser objeto de depreciación.

El costo del terreno en el cual se está levantando la construcción se debe registrar por separado en la cuenta 1504 -terrenos-.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            62 => 
            array (
                'id' => 60,
                'codigo' => '1512',
                'nombre' => 'MAQUINARIA Y EQUIPOS EN MONTAJE',
                'descripcion' => 'Registra los costos incurridos por el ente económico en la adquisición y montaje de maquinaria, hasta el momento en que el activo queda listo para su utilización o explotación, en el sitio y condiciones requeridas.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            63 => 
            array (
                'id' => 143,
                'codigo' => '2416',
                'nombre' => 'A LA PROPIEDAD RAÍZ',
                'descripcion' => 'Registra el valor de las tasas impositivas generadas por la propiedad de bienes raíces, de acuerdo con las liquidaciones oficiales o normas legales vigentes.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 13,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            64 => 
            array (
                'id' => 61,
                'codigo' => '1516',
                'nombre' => 'CONSTRUCCIONES Y EDIFICACIONES',
                'descripcion' => 'Registra el costo de adquisición o construcción de inmuebles de propiedad del ente económico destinados para el desarrollo del objeto social.

El valor del terreno debe registrarse por separado en la cuenta 1504 -terrenos-.

La diferencia resultante con el precio de enajenación se registrará en la cuenta de ingresos (gastos) no operacionales.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            65 => 
            array (
                'id' => 62,
                'codigo' => '1520',
                'nombre' => 'MAQUINARIA Y EQUIPO',
                'descripcion' => 'Registra el costo histórico de la maquinaria y equipo adquirida por el ente económico.

El costo también incluye la diferencia en cambio causada hasta que se encuentre en condiciones de utilización, originada por obligaciones en moneda extranjera contraídas para su adquisición.

El valor de la maquinaria y equipo recibidos en cambio o permuta se determinará por avalúo técnico y el del aportado por los accionistas o socios se debe registrar por el valor convenido por éstos o aprobado por las entidades de control, según el caso.

La diferencia resultante con el precio de enajenación se registrará en la cuenta de ingresos (gastos) no operacionales.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            66 => 
            array (
                'id' => 63,
                'codigo' => '1524',
                'nombre' => 'EQUIPO DE OFICINA',
                'descripcion' => 'Registra el costo histórico del equipo mobiliario, mecánico y electrónico de propiedad del ente económico, utilizado para el desarrollo de sus operaciones.

La diferencia resultante con el precio de enajenación se registrará en la cuenta de ingresos (gastos) no operacionales.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            67 => 
            array (
                'id' => 64,
                'codigo' => '1528',
                'nombre' => 'EQUIPO DE COMPUTACION Y COMUNICACION',
                'descripcion' => 'Registra el costo histórico del equipo de cómputo y comunicación adquiridos por el ente económico para el desarrollo de sus planes o actividades de sistematización y/o comunicación.

La diferencia resultante con el precio de enajenación se registrará en la cuenta de ingresos (gastos) no operacionales.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            68 => 
            array (
                'id' => 65,
                'codigo' => '1532',
                'nombre' => 'EQUIPO MEDICO-CIENTIFICO',
                'descripcion' => 'Registra el costo histórico de los equipos y elementos médico-científicos cuya vida útil exceda de un año, adquiridos por el ente económico.

La diferencia resultante con el precio de enajenación se registrará en la cuenta de ingresos (gastos) no operacionales.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            69 => 
            array (
                'id' => 66,
                'codigo' => '1536',
                'nombre' => 'EQUIPO DE HOTELES Y RESTAURANTES',
                'descripcion' => 'Registra los costos en que incurre el ente económico en la adquisición e instalación de los equipos para hoteles y restaurantes para ser utilizados en desarrollo de sus actividades.

La diferencia resultante con el precio de enajenación se registrará en la cuenta de ingresos (gastos) no operacionales.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            70 => 
            array (
                'id' => 67,
                'codigo' => '1540',
                'nombre' => 'FLOTA Y EQUIPO DE TRANSPORTE',
                'descripcion' => 'Registra el costo histórico de las unidades de transporte, equipos de movilización y maquinaria de propiedad del ente económico destinados al transporte de pasajeros y de carga para el desarrollo de sus actividades.

La diferencia resultante con el precio de enajenación se registrará en la cuenta de ingresos (gastos) no operacionales.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            71 => 
            array (
                'id' => 68,
                'codigo' => '1544',
                'nombre' => 'FLOTA Y EQUIPO FLUVIAL Y/O MARITIMO',
                'descripcion' => 'Registra el costo histórico de los equipos flotantes de propiedad del ente económico para el desarrollo de sus actividades.

La diferencia resultante con el precio de enajenación se registrará en la cuenta de ingresos (gastos) no operacionales.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            72 => 
            array (
                'id' => 69,
                'codigo' => '1548',
                'nombre' => 'FLOTA Y EQUIPO AEREO',
                'descripcion' => 'Registra el costo histórico de los aviones, hidroaviones, planeadores, helicópteros y otros equipos similares, adquiridos por el ente económico para el desarrollo de sus actividades.

La diferencia resultante con el precio de enajenación se registrará en la cuenta de ingresos (gastos) no operacionales.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            73 => 
            array (
                'id' => 107,
                'codigo' => '2105',
                'nombre' => 'BANCOS NACIONALES',
                'descripcion' => 'Registra el monto del capital de las obligaciones contraídas por el ente económico, en moneda nacional o extranjera, con establecimientos bancarios.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 10,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            74 => 
            array (
                'id' => 220,
                'codigo' => '3710',
                'nombre' => 'PERDIDAS ACUMULADAS',
                'descripcion' => 'no registra descripcion',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 25,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            75 => 
            array (
                'id' => 71,
                'codigo' => '1556',
                'nombre' => 'ACUEDUCTOS, PLANTAS Y REDES',
                'descripcion' => 'Registra el costo incurrido por el ente económico en la adquisición o construcción de acueductos, plantas y redes necesarios en la actividad del objeto social.

La diferencia resultante con el precio de enajenación se registrará en la cuenta de ingresos (gastos) no operacionales.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            76 => 
            array (
                'id' => 72,
                'codigo' => '1560',
                'nombre' => 'ARMAMENTO DE VIGILANCIA',
                'descripcion' => 'Registra el costo de adquisición del armamento de vigilancia adquirido por el ente económico para el desarrollo de su objeto social y/o para la protección y salvaguarda de sus bienes.

La diferencia resultante con el precio de enajenación se registrará en la cuenta de ingresos (gastos) no operacionales.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            77 => 
            array (
                'id' => 73,
                'codigo' => '1562',
                'nombre' => 'ENVASES Y EMPAQUES',
                'descripcion' => 'Registra el costo de los envases y empaques retornables utilizados para la distribución del producto objeto de las actividades del negocio.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            78 => 
            array (
                'id' => 74,
                'codigo' => '1564',
                'nombre' => 'PLANTACIONES AGRICOLAS Y FORESTALES',
                'descripcion' => 'Registra los costos amortizables en que incurre el ente económico en los procesos de preparación de terrenos, siembra y desarrollo que corresponden a los períodos preproductivo y productivo de aquellas plantaciones agrícolas y forestales cuya vida útil es superior a dos años, en el cual se generan varias cosechas.

La diferencia resultante con el precio de enajenación se registrará en la cuenta de ingresos (gastos) no operacionales.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            79 => 
            array (
                'id' => 75,
                'codigo' => '1568',
                'nombre' => 'VIAS DE COMUNICACION',
                'descripcion' => 'Registra el costo incurrido por el ente económico en el diseño y construcción, entre otros de vías, caminos, carreteras, puentes, aeródromos, en sus propios predios directamente o por intermedio de terceros.

La diferencia resultante con el precio de enajenación se registrará en la cuenta de ingresos (gastos) no operacionales.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            80 => 
            array (
                'id' => 76,
                'codigo' => '1572',
                'nombre' => 'MINAS Y CANTERAS ',
                'descripcion' => 'Registra los costos en que incurre el ente económico en la adquisición de los terrenos, instalaciones y montaje necesarios para la explotación de minas y canteras.

Los costos incurridos hasta hacer apta la mina para su explotación serán capitalizables.

La diferencia resultante con el precio de enajenación se registrará en la cuenta de ingresos (gastos) no operacionales.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            81 => 
            array (
                'id' => 77,
                'codigo' => '1576',
                'nombre' => 'POZOS ARTESIANOS',
                'descripcion' => 'Registra los costos y gastos incurridos por concepto de la adquisición, construcción directa o a través de contratistas o en forma combinada, de las perforaciones realizadas por el ente económico necesarias en la actividad del objeto social.

La diferencia resultante con el precio de enajenación se registrará en la cuenta de ingresos (gastos) no operacionales.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            82 => 
            array (
                'id' => 78,
                'codigo' => '1580',
                'nombre' => 'YACIMIENTOS',
                'descripcion' => 'Registra el costo de las formaciones subterráneas o reservas probadas de minerales e hidrocarburos existentes en un campo agotable.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            83 => 
            array (
                'id' => 79,
                'codigo' => '1584',
                'nombre' => 'SEMOVIENTES',
                'descripcion' => 'Registra el costo de los semovientes que posee el ente económico para el mejoramiento de razas, así como los destinados al servicio de las diferentes actividades productoras.

La diferencia resultante con el precio de enajenación se registrará en la cuenta de ingresos (gastos) no operacionales.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            84 => 
            array (
                'id' => 80,
                'codigo' => '1588',
                'nombre' => 'PROPIEDADES, PLANTA Y EQUIPO EN TRANSITO',
                'descripcion' => 'Registra el costo de adquisición y demás cargos capitalizables en que incurre el ente económico en el proceso de importación de bienes, así como en las compras nacionales, desde el momento en que inicia el trámite de adquisición hasta cuando le sean entregados para su utilización.

Mientras los bienes permanezcan en esta condición no deben ser objeto de depreciación.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'grupo_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            85 => 
            array (
                'id' => 81,
                'codigo' => '1592',
                'nombre' => 'DEPRECIACION ACUMULADA',
                'descripcion' => 'Registra el monto de la depreciación calculada por el ente económico sobre la base del costo ajustado por inflación.

Se consideran bienes depreciables las propiedades, planta y equipo tangibles con excepción de los terrenos, las construcciones e importaciones en curso y la maquinaria en montaje.

En todo inmueble, se debe desagregar contablemente previo concepto de perito avaluador cuando sea el caso, el importe atribuible al terreno y a la construcción.

La depreciación debe basarse en la vida útil estimada del bien. Para la fijación de ésta es necesario considerar el deterioro por el uso y la acción de factores naturales, así como la obsolescencia por avances tecnológicos o por cambios en la demanda de los bienes producidos o de los servicios prestados. La vida útil podrá fijarse con base en conceptos o tablas de depreciación de reconocido valor técnico.

Cuando se adquiera un bien que haya estado en uso y por lo tanto haya sido total o parcialmente depreciado, el ente económico deberá depreciarlo, teniendo en cuenta la vida útil restante.

El valor de las propiedades, planta y equipo que tienen una vida útil limitada, debe distribuirse como una forma de medir la expiración de éste, mediante el registro sistemático de su depreciación, durante su vida útil o el período estimado en que dichos activos generan ingresos. Con tal fin, deberá observarse lo siguiente:

a) El costo ajustado por inflación es la base para la depreciación de las propiedades, planta y equipo y cuando sea significativo de este monto se debe restar el valor residual técnicamente determinado;

b) La depreciación debe ser determinada por métodos de reconocido valor técnico, tales como el de línea recta, saldos decrecientes, suma de los dígitos de los años. El método seleccionado debe establecer una relación adecuada entre los costos expirados de los bienes y los ingresos correspondientes, y

c) Los cambios en las estimaciones iniciales del período de vida útil, se deben reconocer mediante la modificación de la alícuota por depreciación en forma prospectiva de acuerdo con la nueva estimación.

Cuando la depreciación fiscal exceda la contable, el efecto en el impuesto diferido se registrará en la subcuenta 272505 -por depreciación flexible-.

Por el contrario, cuando la depreciación contable exceda a la depreciación fiscal, el efecto en el impuesto diferido se registrará en la subcuenta 171076 -impuesto de renta diferido "débitos" por diferencias temporales-.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 5,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
86 => 
array (
    'id' => 82,
    'codigo' => '1596',
    'nombre' => 'DEPRECIACION DIFERIDA',
    'descripcion' => 'Registra el saldo de las diferencias que resultaron entre las depreciaciones contable y fiscal por determinación de normas legales.

Si la depreciación fiscal excedió la contable, el efecto en el impuesto diferido se debe incluir en la subcuenta 272505 -por depreciación flexible-.

Por el contrario, si la depreciación contable excedió a la fiscal, el efecto en el impuesto diferido se debe incluir en la subcuenta 171076 -impuestos de renta diferido "débitos" por diferencias temporales-.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 5,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
87 => 
array (
    'id' => 83,
    'codigo' => '1597',
    'nombre' => 'AMORTIZACION ACUMULADA',
    'descripcion' => 'Registra el monto de la amortización acumulada por el ente económico sobre la base del costo ajustado por inflación, de las propiedades, planta y equipo tangibles, tales como plantaciones agrícolas y forestales, vías de comunicación y semovientes.

La amortización debe basarse en la vida útil del bien. Para la fijación de dicha vida útil es necesario considerar el deterioro por el uso y la acción de factores naturales.

El valor de las propiedades, plantas y equipos que tienen una vida útil limitada, debe destinarse como una forma de medir la expiración de éstos, mediante el registro sistemático de su amortización durante su vida útil o el período estimado en que dichos activos generan ingresos.

Por lo anterior, se deberá observar lo siguiente:

El costo ajustado por inflación es la base para la amortización de la propiedad;
La amortización debe ser determinada mediante alícuotas establecidas de acuerdo con estudios técnicos por medio de los cuales se puede establecer una relación adecuada entre las costas expiradas de los bienes y los ingresos correspondientes, y
Los cambios en las estimaciones del período de vida útil, se deben reconocer mediante la modificación de la alícuota por amortización en forma prospectiva de acuerdo con la nueva estimación.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 5,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
88 => 
array (
    'id' => 84,
    'codigo' => '1598',
    'nombre' => 'AGOTAMIENTO ACUMULADO',
    'descripcion' => 'Registra la acumulación de las alícuotas o valores llevados a cuentas de resultado, por la distribución o prorrateo del costo de un recurso natural, calculado con base en las reservas probadas mediante estudio técnico en las unidades producidas, extraídas u otros factores de reconocido valor técnico.

Es una cuenta de naturaleza crédito.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 5,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
89 => 
array (
    'id' => 85,
    'codigo' => '1599',
    'nombre' => 'PROVISIONES',
    'descripcion' => 'Registra los valores provisionados por el ente económico, con el objeto de cubrir la desvalorización de los bienes individualmente considerados o por grupos homogéneos. Es una cuenta de valuación del activo de naturaleza crédito.

La desvalorización resulta cuando el valor neto de los activos exceda el valor de realización, valor actual o valor presente, el que se haya utilizado. En consecuencia, atendiendo la norma básica de la prudencia se constituirá una provisión que afectará el estado de resultados del respectivo período.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 5,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
90 => 
array (
    'id' => 86,
    'codigo' => '1605',
    'nombre' => 'CREDITO MERCANTIL',
    'descripcion' => 'Registra el valor adicional pagado en la compra de un ente económico activo, sobre el valor en libros o sobre el valor calculado o convenido de todos los activos netos comprados, por reconocimiento de atributos especiales tales como el buen nombre, personal idóneo, reputación de crédito privilegiado, prestigio por vender mejores productos y servicios y localización favorable.

También registra el crédito mercantil formado por el ente económico mediante la estimación de las futuras ganancias en exceso de lo normal, así como de la valorización anticipada de la potencialidad del negocio.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 6,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
91 => 
array (
    'id' => 87,
    'codigo' => '1610',
    'nombre' => 'MARCAS',
    'descripcion' => 'Registra el costo de adquisición o de producción y registro de signos que, de acuerdo con las normas legales, sirven para distinguir los productos o servicios de un ente económico de los de otro. Así mismo registra el costo de marcas catalogadas como colectivas. Se entiende por marca colectiva todo signo calificado de tal, que sirva para distinguir el origen o cualquier otra característica común de productos o de servicios de empresas o colectividades diferentes que utilicen la marca bajo el control del titular.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 6,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
92 => 
array (
    'id' => 88,
    'codigo' => '1615',
    'nombre' => 'PATENTES',
    'descripcion' => 'Registra el costo de adquisición o de creación y registro de las patentes las cuales confieren a su titular el derecho a explotar en forma exclusiva la invención por sí mismo, a conceder una o más licencias para su explotación y a percibir regalías o compensaciones derivadas de su explotación por terceros.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 6,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
93 => 
array (
    'id' => 89,
    'codigo' => '1620',
    'nombre' => 'CONCECIONES Y FRANQUICIAS',
    'descripcion' => 'Registra el privilegio concedido por una autoridad gubernamental permitiendo el uso de una propiedad pública que usualmente está sujeto a una regulación especial; o el privilegio frecuentemente exclusivo concedido por un fabricante o distribuidor para vender los productos del primero dentro de un territorio específico.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 6,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
94 => 
array (
    'id' => 99,
    'codigo' => '1730',
    'nombre' => 'CARGOS POR CORRECION MONETARIA DIFERIDA',
    'descripcion' => 'Registra el ajuste por inflación sobre la parte proporcional del patrimonio que está financiando las construcciones en curso, los cultivos de mediano y tardío rendimiento en período improductivo, los programas de ensanche, que no estén en condiciones de generar ingresos o de ser enajenados y sobre los cargos diferidos no monetarios, de conformidad con las normas legales vigentes.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 7,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
95 => 
array (
    'id' => 144,
    'codigo' => '2420',
    'nombre' => 'DERECHOS SOBRE INSTRUMENTOS PÚBLICOS',
    'descripcion' => 'Registra el valor de las tasas liquidadas de responsabilidad del ente económico por concepto de derechos de registro, anotación y notariales.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 13,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
96 => 
array (
    'id' => 90,
    'codigo' => '1625',
    'nombre' => 'DERECHOS',
    'descripcion' => 'Registra el valor apreciable en dinero que confiere el ente económico, derechos tales como la exclusividad de producir y vender material de lectura, grabaciones y obras de arte al amparo de la propiedad intelectual, al igual que aquellos importes incurridos en su adquisición cuando son comprados.

Registra también el valor pagado al adquirir puestos en las bolsas de valores o agropecuarias, los derechos derivados de bienes entregados en fiducia mercantil, que dan al fideicomitente o beneficiario la posibilidad de ejercerlos de acuerdo con el acto constitutivo o la ley, así como los que originan aquellos bienes recibidos en arrendamiento financiero.

La transferencia de uno o más bienes que hace el fiduciante o fideicomitente al fiduciario debe efectuarse, para fines contables, por su costo ajustado, de suerte que la entrega en sí misma no genera la realización de utilidades para el constituyente y éstas sólo tendrán incidencia en los resultados cuando "realmente" se enajene a terceros el bien o bienes objeto del fideicomiso.

El valor asignado al bien(es) en fideicomiso se revelará en cuentas de orden bajo el código 839520 -bienes y valores en fideicomiso-.

162515 -en fideicomisos inmobiliarios-, registra los contratos fiduciarios mediante los cuales el ente económico transfiere un bien inmueble a la entidad fiduciaria para que administre y desarrolle un proyecto inmobiliario de acuerdo con las instrucciones señaladas en el contrato, cuando el beneficiario sea el mismo fideicomitente.

162520 -en fideicomisos de garantía-, registra los contratos fiduciarios mediante los cuales el ente económico transfiere uno o varios bienes a una entidad fiduciaria para garantizar con ellos y/o con su producto el cumplimiento de ciertas obligaciones designando como beneficiario a los acreedores de dichas obligaciones. Tales fideicomisos, igualmente, se registrarán en el código 8110 -bienes y valores entregados en garantía-.

162525 -en fideicomisos de administración-, registra los negocios fiduciarios en los cuales el ente económico realiza la entrega de los bienes fideicomitidos con transferencia de propiedad con el fin de que el fiduciario los administre y los destine junto con los rendimientos, según el caso, al cumplimiento de la finalidad señalada en el contrato.

162535 -En bienes recibidos en arrendamiento financiero (leasing), registra los derechos derivados de bienes recibidos en arrendamiento financiero con opción de compra, en los términos previstos en las normas legales vigentes, tales como inmuebles, maquinaria y equipo, vehículos y equipo de computación, así como aquellos activos recibidos bajo la figura "lease-back " o retroarriendo.

El costo de los derechos sobre estos bienes, lo constituye el valor del contrato, es decir, el valor presente de los cánones de arrendamiento y de la opción de compra pactados, calculados a la fecha del respectivo contrato y a la tasa pactada en el mismo.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 6,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
97 => 
array (
    'id' => 91,
    'codigo' => '1630',
    'nombre' => 'KNOW HOW',
    'descripcion' => 'Registra el valor apreciable en dinero del conocimiento práctico sobre la manera de hacer o lograr algo con facilidad y eficiencia aprovechando al máximo los esfuerzos, habilidades y experiencias acumulados en un arte o técnica.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 6,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
98 => 
array (
    'id' => 92,
    'codigo' => '1635',
    'nombre' => 'LICENCIAS',
    'descripcion' => 'Registra el costo o valor pagado al titular de una patente para la explotación de la misma por parte del ente económico.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 6,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
99 => 
array (
    'id' => 93,
    'codigo' => '1698',
    'nombre' => 'DEPRECIACION Y/O AMORTIZACION ACUMULADA',
    'descripcion' => 'Registra el monto de las depreciaciones y/o amortizaciones acumuladas de los activos intangibles de propiedad del ente económico.

La depreciación y/o amortización debe considerar la vida útil estimada del intangible, es decir, los períodos en los cuales producirá beneficios económicos y la duración de la protección legal conferida al mismo.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 6,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
100 => 
array (
    'id' => 94,
    'codigo' => '1699',
    'nombre' => 'PROVISIONES',
    'descripcion' => 'Registra los montos provisionados por el ente económico, para cubrir eventuales pérdidas derivadas del grupo 16 -intangibles-.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 6,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
101 => 
array (
    'id' => 95,
    'codigo' => '1705',
    'nombre' => 'GASTOS PAGADOS POR ANTICIPADO',
    'descripcion' => 'Registra el valor de los gastos pagados por anticipado que realiza el ente económico en el desarrollo de su actividad, los cuales se deben amortizar durante el período en que se reciben los servicios o se causen los costos o gastos. Así, los intereses se causarán durante el período prepagado a medida que transcurra el tiempo; los seguros durante la vigencia de la póliza; los arrendamientos durante el período prepagado; el mantenimiento de equipos durante la vigencia del contrato.

Las comisiones, así como los demás conceptos enunciados en esta cuenta, son susceptibles de diferir y, por ende, de amortizar en el período correspondiente, cuando por efectos de la operación que las origina se pacte reintegro en función del servicio contratado, salvo que se trate de conceptos incluidos taxativamente en el código 1710 -cargos diferidos-.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 7,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
102 => 
array (
    'id' => 108,
    'codigo' => '2110',
    'nombre' => 'BANCOS DEL EXTERIOR',
    'descripcion' => 'Registra el monto del capital de las obligaciones contraídas por el ente económico, en moneda extranjera, con entidades bancarias del exterior.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 10,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
103 => 
array (
    'id' => 109,
    'codigo' => '2115',
    'nombre' => 'CORPORACIONES FINANCIERAS',
'descripcion' => 'Registra el monto del capital de las obligaciones contraídas por el ente económico en moneda nacional o extranjera con corporaciones financieras, así como el valor de los cánones de arrendamiento y opción de compra pactados en los contratos de arrendamiento financiero (leasing) celebrados con ellas.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 10,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
104 => 
array (
    'id' => 110,
    'codigo' => '2120',
    'nombre' => 'COMPAÑIAS DE FINANCIAMIENTO COMERCIAL',
'descripcion' => 'Registra el monto del capital de las obligaciones contraídas por el ente económico con compañías de financiamiento comercial, así como el valor de los cánones de arrendamiento y opción de compra pactados en los contratos de arrendamiento financiero (leasing) celebrados con ellas.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 10,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
105 => 
array (
    'id' => 111,
    'codigo' => '2125',
    'nombre' => 'CORPORACIONES DE AHORRO Y VIVIENDA',
    'descripcion' => 'Registra el monto del capital de las obligaciones contraídas por el ente económico con corporaciones de ahorro y vivienda.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 10,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
106 => 
array (
    'id' => 112,
    'codigo' => '2130',
    'nombre' => 'ENTIDADES FINANCIERAS DEL EXTERIOR',
    'descripcion' => 'Registra el valor de las obligaciones por concepto de operaciones y préstamos en moneda extranjera, adquiridas por el ente económico con entidades internacionales.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 10,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
107 => 
array (
    'id' => 96,
    'codigo' => '1710',
    'nombre' => 'CARGOS DIFERIDOS',
    'descripcion' => 'Registra entre otros:

Los costos y gastos en que incurre el ente económico en las etapas de organización, exploración, construcción, instalación, montaje y de puesta en marcha.
Los costos y gastos ocasionados en la investigación y desarrollo de estudios y proyectos.
Las mejoras a propiedades tomadas en arrendamiento.
Los útiles y papelería.
El impuesto de renta diferido de naturaleza "débito", ocasionado por las "diferencias temporales" entre la utilidad comercial y la renta líquida fiscal en virtud de la no deducibilidad de algunos gastos contables, tales como provisiones por cartera en exceso de límites fiscales, protección de inversiones, bienes recibidos en pago, causación del impuesto de industria y comercio y gastos estimados para atender contingencias. Su registro se hará directamente contra la provisión del impuesto de renta corriente (código 240405).
La publicidad, propaganda y promoción.
Las contribuciones y afiliaciones.
Los demás costos y gastos en que por su naturaleza y características se tipifique la figura de cargos diferidos.

La amortización de los cargos diferidos se hará así:

Por concepto de organización y preoperativos y programas para computador (software), en un período no mayor a cinco (5) y a tres (3) años, respectivamente.
Por concepto de útiles y papelería, se amortizarán en función directa con el consumo.
Por concepto de mejoras a propiedades tomadas en arrendamiento, se amortizarán en el período menor entre la vigencia del respectivo contrato (sin tener en cuenta las prórrogas) y su vida útil probable, cuando su costo no es reembolsable.
Por concepto del impuesto de renta diferido "débito" por diferencias temporales, se amortizarán en el momento mismo que se cumplan los requisitos de ley y reglamentarios de que tratan las disposiciones fiscales, según la naturaleza de la deducción pertinente o cuando desaparezcan las causas que la originaron para las derivadas de protección de inversiones, bienes recibidos en pago o gastos estimados para atender contingencias; para estos efectos no será deducible la pérdida en enajenación de acciones o cuotas de interés social; su amortización se hará directamente contra la provisión del impuesto de renta corriente en la vigencia fiscal correspondiente.
Por concepto de publicidad y propaganda se amortizarán durante un período de tiempo igual al establecido para el ejercicio contable.
Por concepto de contribuciones y afiliaciones, se amortizarán durante el período prepagado pertinente.
Por otros conceptos, se amortizarán durante el período estimado de recuperación de la erogación o de obtención de los beneficios esperados.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 7,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
108 => 
array (
    'id' => 97,
    'codigo' => '1715',
    'nombre' => 'COSTOS DE EXPLORACION POR AMORTIZAR',
    'descripcion' => 'Registra el valor de los costos incurridos, en desarrollo de trabajos exploratorios no exitosos o no comerciales y que por su condición de inexplotables son susceptibles de amortización.

Esta cuenta es de uso exclusivo de los entes económicos que desarrollan actividades de exploración y explotación de hidrocarburos.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 7,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
109 => 
array (
    'id' => 98,
    'codigo' => '1720',
    'nombre' => 'COSTOS DE EXPLOTACION Y DESARROLLO',
    'descripcion' => 'Registra el valor de los costos incurridos en la perforación de pozos de desarrollo y que son susceptibles de amortizar, tales como costos de mano de obra, servicios de registros, cementaciones, inspecciones, despejes de terreno, construcción de vías de acceso al pozo productor, entre otros.

Esta cuenta es de uso exclusivo de los entes económicos que desarrollan actividades de exploración y explotación de hidrocarburos.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 7,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
110 => 
array (
    'id' => 100,
    'codigo' => '1798',
    'nombre' => 'AMORTIZACION ACUMULADA',
    'descripcion' => 'Registra el valor de las amortizaciones acumuladas de las cuentas 1715 -costos de exploración por amortizar- y 1720 -costos de explotación y desarrollo-.

La amortización debe considerar los períodos en los cuales producirá beneficios económicos.

Esta cuenta es de uso exclusivo de los entes económicos que desarrollan actividades de exploración y explotación de hidrocarburos.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 7,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
111 => 
array (
    'id' => 101,
    'codigo' => '1805',
    'nombre' => 'BIENES DE ARTE Y CULTURA',
    'descripcion' => 'Registra el costo de las adquisiciones que efectúa el ente económico en obras tales como de arte, artesanías y libros con el propósito de fomentar la actividad cultural y de investigación.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 8,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
112 => 
array (
    'id' => 102,
    'codigo' => '1895',
    'nombre' => 'DIVERSOS',
    'descripcion' => 'Registra el costo de los activos no determinados en las cuentas anteriores, entre otros:

-Máquinas porteadoras y estampillas.

Registra los pagos efectuados a favor de la Administración Postal para la adquisición de especies que mantiene el ente económico para la venta a terceros o para uso interno.

- Bienes entregados en comodato.

Registra el valor de los bienes de propiedad del ente económico que han sido entregados a una persona natural o jurídica mediante un contrato de comodato.

Se entiende por contrato de comodato, según la expresión del Código Civil, el contrato en que "una de las partes entrega a la otra gratuitamente una especie mueble o raíz, para que haga uso de ella y con cargo de restituir la misma especie después de terminar el uso".

El desgaste de los bienes entregados en comodato como consecuencia de su uso y del paso del tiempo, se debe registrar en la subcuenta 189515 -amortización acumulada de bienes entregados en comodato-.

Para efectos de fijar los criterios de amortización se deben seguir los mismos parámetros fijados para la depreciación de propiedades planta y equipo cuenta 1592.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 8,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
113 => 
array (
    'id' => 103,
    'codigo' => '1899',
    'nombre' => 'PROVISIONES',
    'descripcion' => 'Registra los montos provisionados por el ente económico, para cubrir eventuales pérdidas derivadas del grupo 18 -otros activos-.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 8,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
114 => 
array (
    'id' => 104,
    'codigo' => '1905',
    'nombre' => 'DE INVERSIONES',
    'descripcion' => 'Registra la diferencia favorable entre el valor de realización y el valor en libros de las inversiones de propiedad del ente económico, que han sido adquiridas con el propósito de cumplir con disposiciones legales o con el fin de mantener una disponibilidad secundaria de liquidez, al igual que las adquiridas con carácter permanente.

Para el registro contable de las valorizaciones de las acciones, cuotas o partes de interés social, se aplicará el valor de mercado y a falta de éste su valor intrínseco.

- Se entiende por valor de mercado el precio promedio de cotización representativa en las bolsas de valores en el último mes.

- El valor intrínseco se aplicará cuando no se coticen en ninguna bolsa de valores, o no se hayan negociado durante el mes correspondiente al corte de cuentas, o se trate de participaciones, para lo cual se utilizarán estados financieros certificados. No obstante, cuando el ente económico adopte el método de participación, excluirá el efecto de las utilidades en el valor intrínseco.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 9,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
115 => 
array (
    'id' => 105,
    'codigo' => '1910',
    'nombre' => 'DE PROPIEDADES PLANTA Y EQUIPO',
    'descripcion' => 'Registra las valorizaciones de activos contabilizados en el grupo propiedades, planta y equipo.

- Bienes inmuebles considerados como propiedades, planta y equipo:

Cuando se trate de esta clase de bienes, se debe obtener un avalúo comercial practicado por personas o firmas de reconocida especialidad e independencia, que contenga las características señaladas en las normas legales vigentes.

Una vez determinado el valor comercial y cuando éste exceda el costo ajustado en libros, se procederá a registrar la valorización como superávit por valorizaciones de propiedades, planta y equipo.

uando se establezca que el valor comercial es inferior a la valorización registrada, sin afectar el costo ajustado, ésta debe reversarse hasta su concurrencia. Cualquier diferencia por debajo del costo ajustado, atendiendo la norma de la prudencia, para cada inmueble individualmente considerado se constituirá una provisión que afectará el estado de resultados del respectivo período; para estos efectos no se aceptará el método de "grupos homogéneos".',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 9,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
116 => 
array (
    'id' => 106,
    'codigo' => '1995',
    'nombre' => 'DE OTROS ACTIVOS',
    'descripcion' => 'Registra los valores originados por la diferencia entre el valor del avalúo comercial y el valor neto en libros o costo de los mismos, de aquellos bienes no especificados anteriormente, entre otros: bienes de arte y cultura y bienes entregados en comodato o bienes recibidos en pago. Su cálculo se debe determinar utilizando métodos o avalúos de reconocido valor técnico.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 9,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
117 => 
array (
    'id' => 113,
    'codigo' => '2135',
    'nombre' => 'COMPROMISOS DE RECOMPRA DE INVERSIONES NEGOCIADAS',
'descripcion' => 'Registra los fondos que recibe el ente económico garantizados con sus inversiones bajo la modalidad del pacto de recompra.Esta cuenta es correlativa en la contabilidad del comprador a la cuenta 1250 -derechos de recompra de inversiones negociadas, Repos-.La diferencia entre el valor presente (recibo de efectivo) y el valor futuro (precio de recompra) constituye un gasto financiero por intereses, que se debe reconocer en los términos pactados (anticipados o vencidos) bajo la norma básica de la realización.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 10,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
118 => 
array (
    'id' => 114,
    'codigo' => '2140',
    'nombre' => 'COMPROMISOS DE RECOMPRA DE CARTERA NEGOCIADA',
'descripcion' => 'Registra los fondos que recibe el ente económico garantizados con su cartera bajo la modalidad de pacto de recompra.Esta cuenta es correlativa en la contabilidad del comprador a la cuenta 1385 -derechos de recompra de cartera negociada-.La diferencia entre el valor presente (recibo de efectivo) y el valor futuro (precio de recompra) constituye un gasto financiero que se debe reconocer en los términos pactados (anticipados o vencidos) bajo la norma básica de la contabilidad de causación.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 10,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
119 => 
array (
    'id' => 115,
    'codigo' => '2145',
    'nombre' => 'OBLIGACIONES GUBERNAMENTALES',
    'descripcion' => 'Registra el monto del capital de las obligaciones contraídas por el ente económico con el Gobierno Nacional o entidades estatales, tales como el Instituto de Fomento Industrial, IFI, y la Financiera Energética Nacional S.A., FEN.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 10,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
120 => 
array (
    'id' => 116,
    'codigo' => '2195',
    'nombre' => 'OTRAS OBLIGACIONES',
    'descripcion' => 'Registra el valor de las obligaciones contraídas por el ente económico con entes diferentes a establecimientos de crédito e instituciones financieras.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 10,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
121 => 
array (
    'id' => 117,
    'codigo' => '2205',
    'nombre' => 'NACIONALES',
    'descripcion' => 'Registra las obligaciones contraídas, en moneda nacional o extranjera por el ente económico con proveedores para la adquisición de bienes y servicios tales como materiales, materias primas, equipos, suministro de servicios y contratación de obras.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 11,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
122 => 
array (
    'id' => 118,
    'codigo' => '2210',
    'nombre' => 'DEL EXTERIOR',
    'descripcion' => 'Registra el valor de las obligaciones a cargo del ente económico y a favor de extranjeros por concepto de la adquisición de bienes o servicios, así como contratos de obra.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 11,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
123 => 
array (
    'id' => 141,
    'codigo' => '2408',
    'nombre' => 'IMPUESTO SOBRE LAS VENTAS POR PAGAR',
    'descripcion' => 'Registra tanto el valor recaudado o causado como el valor pagado o causado, en la adquisición o venta de bienes producidos, importados y comercializados, así como de los servicios prestados y/o recibidos, gravados de acuerdo con las normas fiscales vigentes, los cuales pueden generar un saldo a favor o a cargo del ente económico, producto de las diferentes transacciones ya que se trata de una cuenta corriente.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 13,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
124 => 
array (
    'id' => 119,
    'codigo' => '2215',
    'nombre' => 'CUENTAS CORRIENTES COMERCIALES',
    'descripcion' => 'Registra el valor adeudado por el ente económico a proveedores de mercancías o servicios con los cuales se mantiene un contrato de cuenta corriente en los términos previstos en las normas legales vigentes.En virtud del contrato de cuenta corriente, los créditos y débitos derivados de las remesas mutuas de las partes se consideran como partidas indivisibles de abono o de cargo en la cuenta de cada cuentacorrentista, de modo que sólo el saldo que resulte a la clausura de la cuenta constituirá un crédito exigible.La clausura y la liquidación de la cuenta en los períodos de cierre, no producirán la terminación del contrato sino en los casos previstos en dichas normas.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 11,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
125 => 
array (
    'id' => 120,
    'codigo' => '2220',
    'nombre' => 'CASA MATRIZ',
    'descripcion' => 'Registra el valor de las deudas a cargo del ente económico originadas en la adquisición de bienes, servicios y/o contratos de obra suministrados directamente por la casa matriz.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 11,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
126 => 
array (
    'id' => 121,
    'codigo' => '2225',
    'nombre' => 'COMPAÑIAS VINCULADAS',
    'descripcion' => 'Registra el valor de las obligaciones que tiene el ente económico con compañías vinculadas o asociadas por concepto de adquisición de elementos, materiales, materias primas, equipos, suministro de servicios, contratación de obras, etc., para el desarrollo del objeto social.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 11,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
127 => 
array (
    'id' => 122,
    'codigo' => '2305',
    'nombre' => 'CUENTAS CORRIENTES COMERCIALES',
    'descripcion' => 'Registra el valor adeudado por el ente económico a favor de terceros por conceptos diferentes a los proveedores y obligaciones financieras y con los cuales se mantiene un contrato de cuenta corriente en los términos previstos en las normas legales vigentes.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 12,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
128 => 
array (
    'id' => 123,
    'codigo' => '2310',
    'nombre' => 'A CASA MATRIZ',
    'descripcion' => 'Registra las deudas a cargo del ente económico y a favor de la casa matriz o principal por conceptos diferentes a los definidos en la cuenta 2220 -casa matriz-.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 12,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
129 => 
array (
    'id' => 124,
    'codigo' => '2315',
    'nombre' => 'A COMPAÑIAS VINCULADAS',
    'descripcion' => 'Registra el valor de las obligaciones que contrae el ente económico con entes vinculados por conceptos diferentes a los definidos en la cuenta 2225 -compañías vinculadas-.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 12,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
130 => 
array (
    'id' => 125,
    'codigo' => '2320',
    'nombre' => 'A CONTRATISTAS',
    'descripcion' => 'Registra el valor adeudado por el ente económico a terceros por la realización de obras de acuerdo con los contratos respectivos.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 12,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
131 => 
array (
    'id' => 126,
    'codigo' => '2330',
    'nombre' => 'ÓRDENES DE COMPRA POR UTILIZAR',
    'descripcion' => 'Registra las sumas de dinero recibidas por mercancías o productos que no han sido reclamados.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 12,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
132 => 
array (
    'id' => 127,
    'codigo' => '2335',
    'nombre' => 'COSTOS Y GASTOS POR PAGAR',
    'descripcion' => 'Registra aquellos pasivos del ente económico originados por la prestación de servicios, honorarios y gastos financieros entre otros.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 12,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
133 => 
array (
    'id' => 128,
    'codigo' => '2340',
    'nombre' => 'INSTALAMENTOS POR PAGAR',
    'descripcion' => 'Registra el valor adeudado por el ente económico originado en la suscripción de acciones de una sociedad que serán pagadas en los términos estipulados en el respectivo reglamento de colocación y cuyo plazo de cancelación no podrá exceder de un año.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 12,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
134 => 
array (
    'id' => 129,
    'codigo' => '2345',
    'nombre' => 'ACREEDORES OFICIALES',
    'descripcion' => 'Registra el valor adeudado por el ente económico a la Nación o a entidades oficiales por conceptos diferentes a los ya contemplados en este plan.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 12,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
135 => 
array (
    'id' => 130,
    'codigo' => '2350',
    'nombre' => 'REGALIAS POR PAGAR',
    'descripcion' => 'Registra el valor adeudado por el ente económico por concepto de regalías, es decir, el porcentaje de la producción o de los ingresos que de acuerdo con las normas legales y disposiciones contractuales, debe pagar como compensación por el empleo de un bien o la explotación de recursos naturales tales como el petróleo y el carbón.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 12,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
136 => 
array (
    'id' => 131,
    'codigo' => '2355',
    'nombre' => 'DEUDAS CON ACCIONISTAS O SOCIOS ',
    'descripcion' => 'Registra el valor a cargo del ente económico y a favor de los socios y/o accionistas por concepto de préstamos, pagos efectuados por ellos y demás importes a favor de éstos.Se excluyen de esta cuenta los dividendos y participaciones por pagar, los cuales se deben registrar en la cuenta 2360.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 12,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
137 => 
array (
    'id' => 132,
    'codigo' => '2357',
    'nombre' => 'DEUDAS CON DIRECTORES',
    'descripcion' => 'Registra el valor a cargo del ente económico y a favor de los directores por concepto de pagos efectuados por ellos y demás importes a favor de éstos.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 12,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
138 => 
array (
    'id' => 133,
    'codigo' => '2360',
    'nombre' => 'DIVIDENDOS O PARTICIPACIONES POR PAGAR',
    'descripcion' => 'Registra el valor de los dividendos o participaciones decretados por la asamblea general de accionistas o junta de socios y que deberán ser pagados dentro del término legal establecido.MENSUAL',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 12,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
139 => 
array (
    'id' => 134,
    'codigo' => '2365',
    'nombre' => 'RETENCIÓN EN LA FUENTE',
    'descripcion' => 'Registra los importes recaudados por el ente económico a los contribuyentes o sujetos pasivos del tributo a título de retención en la fuente a favor de la administración de impuestos nacionales, en virtud al carácter de recaudador que las disposiciones legales vigentes le han impuesto a los entes económicos, como consecuencia del desenvolvimiento del giro normal del negocio, cuyas actividades y operaciones son objeto de gravamen.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 12,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
140 => 
array (
    'id' => 135,
    'codigo' => '2367',
    'nombre' => 'IMPUESTO A LAS VENTAS RETENIDO',
    'descripcion' => 'Registra el valor de las retenciones en la fuente recaudadas por el concepto del impuesto sobre las ventas, que efectúa el ente económico a los responsables de dicho impuesto, cuando se adquieran bienes corporales muebles o servicios gravados.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 12,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
141 => 
array (
    'id' => 136,
    'codigo' => '2368',
    'nombre' => 'IMPUESTO DE INDUSTRIA Y COMERCIO RETENIDO',
    'descripcion' => 'Registra el valor de las retenciones en la fuente en el impuesto de industria y comercio que efectúa el ente económico, cuando se adquieran bienes o servicios.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 12,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
142 => 
array (
    'id' => 137,
    'codigo' => '2370',
    'nombre' => 'RETENCIONES Y APORTES DE NÓMINA',
    'descripcion' => 'Registra las obligaciones del ente económico a favor de entidades oficiales y privadas por concepto de aportes parciales y descuentos a trabajadores de conformidad con la regulación laboral. Igualmente registra otras acreencias de carácter legal y descuentos especiales debidamente autorizados, a excepción de lo correspondiente a préstamos y retención en la fuente.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 12,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
143 => 
array (
    'id' => 138,
    'codigo' => '2375',
    'nombre' => 'CUENTAS POR DEVOLVER',
    'descripcion' => 'Registra el valor de las cuotas netas que adeuda el ente económico a los suscriptores no adjudicados que se han retirado de los grupos.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 12,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
144 => 
array (
    'id' => 139,
    'codigo' => '2380',
    'nombre' => 'ACREEDORES VARIOS',
    'descripcion' => 'Registra los valores adeudados por el ente económico por conceptos diferentes a los especificados anteriormente tales como depositarios de ganado en participación, comisionistas de bolsas, sociedades administradoras de fondos de inversión, reintegros y fondos de perseverancia.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 12,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
145 => 
array (
    'id' => 140,
    'codigo' => '2404',
    'nombre' => 'DE RENTA Y COMPLEMENTARIOS',
    'descripcion' => 'Registra el valor pendiente de pago por concepto de impuesto de renta y complementarios del respectivo ejercicio; así como los montos de años anteriores sujetos a revisión oficial y cualquier saldo insoluto, menos los anticipos y retenciones pagadas por los correspondientes períodos.Incluye también el valor de las contribuciones especiales y demás recargos que deben pagarse por el impuesto de renta.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 13,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
146 => 
array (
    'id' => 203,
    'codigo' => '3140',
    'nombre' => 'FONDO SOCIAL',
    'descripcion' => 'Registra el valor de los aportes recibidos de cada uno de los afiliados y/o asociados, conforme a las normas vigentes.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 19,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
147 => 
array (
    'id' => 145,
    'codigo' => '2424',
    'nombre' => 'DE VALORIZACIÓN',
    'descripcion' => 'Registra el valor de las tasas impositivas de responsabilidad del ente económico, bien sea en desarrollo de sus operaciones, así como por ser propietario de inmuebles ubicados en los respectivos sectores objeto de los gravámenes, de acuerdo con las normas fiscales vigentes.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 13,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
148 => 
array (
    'id' => 146,
    'codigo' => '2428',
    'nombre' => 'DE TURISMO',
    'descripcion' => 'Registra el impuesto liquidado sobre el valor del servicio efectivamente cobrado a los huéspedes por concepto de alojamiento en establecimientos hoteleros o de hospedaje.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 13,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
149 => 
array (
    'id' => 147,
    'codigo' => '2432',
    'nombre' => 'TASA POR UTILIZACIÓN DE PUERTOS',
    'descripcion' => 'Registra el valor de las tasas impositivas generadas en servicios marítimos a embarcaciones que arriben a puerto colombiano.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 13,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
150 => 
array (
    'id' => 148,
    'codigo' => '2436',
    'nombre' => 'DE VEHÍCULOS',
    'descripcion' => 'Registra el valor de los impuestos liquidados por concepto de rodamientos y otros directamente relacionados con los vehículos de propiedad del ente económico.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 13,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
151 => 
array (
    'id' => 149,
    'codigo' => '2440',
    'nombre' => 'DE ESPECTÁCULOS PÚBLICOS',
    'descripcion' => 'Registra el valor de las tasas impositivas generadas por la exhibición o presentación de espectáculos públicos.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 13,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
152 => 
array (
    'id' => 150,
    'codigo' => '2444',
    'nombre' => 'DE HIDROCARBUROS Y MINAS',
    'descripcion' => 'Registra el valor de los tributos originados en la explotación o venta de hidrocarburos y minerales que el ente económico debe pagar a entidades del gobierno del orden nacional, departamental, distrital o municipal.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 13,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
153 => 
array (
    'id' => 151,
    'codigo' => '2448',
    'nombre' => 'REGALIAS E IMPUESTO A LA PEQUEÑA Y MEDIANA MINERÍA',
    'descripcion' => 'Registra el valor de las tasas liquidadas de responsabilidad del ente económico por concepto de regalías e impuestos a la pequeña y mediana minería.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 13,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
154 => 
array (
    'id' => 152,
    'codigo' => '2452',
    'nombre' => 'A LAS EXPORTACIONES CAFETERAS',
    'descripcion' => 'Registra el valor de los impuestos liquidados de responsabilidad del ente económico originados en gravámenes a las exportaciones cafeteras.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 13,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
155 => 
array (
    'id' => 153,
    'codigo' => '2456',
    'nombre' => 'A LAS IMPORTACIONES',
    'descripcion' => 'Registra el valor de los impuestos liquidados de responsabilidad del ente económico generados por la entrada al país de mercancías o bienes extranjeros.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 13,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
156 => 
array (
    'id' => 154,
    'codigo' => '2460',
    'nombre' => 'CUOTAS DE FOMENTO',
    'descripcion' => 'Registra el valor de las cuotas de fomento liquidadas y de responsabilidad del ente económico generados por la importación de productos tales como cereales, cacao y algodón.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 13,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
157 => 
array (
    'id' => 155,
    'codigo' => '2464',
    'nombre' => 'DE LICORES, CERVEZAS Y CIGARRILLOS',
    'descripcion' => 'Registra el valor de los impuestos liquidados de responsabilidad del ente económico generados por la producción, importación y distribución de licores, cerveza y cigarrillos.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 13,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
158 => 
array (
    'id' => 156,
    'codigo' => '2468',
    'nombre' => 'DE SACRIFICIO DE GANADO',
    'descripcion' => 'Registra el valor de los impuestos liquidados de responsabilidad del ente económico generados por el degüello de ganado mayor.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 13,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
159 => 
array (
    'id' => 157,
    'codigo' => '2472',
    'nombre' => 'AL AZAR Y JUEGOS',
    'descripcion' => 'Registra el valor de los impuestos liquidados de responsabilidad del ente económico generados por la explotación comercial de loterías, juegos permitidos y apuestas permanentes, entre otros.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 13,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
160 => 
array (
    'id' => 158,
    'codigo' => '2476',
    'nombre' => 'GRAVÁMENES Y REGALIAS POR UTILIZACION DEL SUELO',
    'descripcion' => 'Registra el valor de los gravámenes y regalías liquidados de responsabilidad del ente económico generados por delineación urbana, actividades mineras, extracción de arena, cascajo y piedra, entre otros.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 13,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
161 => 
array (
    'id' => 159,
    'codigo' => '2495',
    'nombre' => 'OTROS',
    'descripcion' => 'Registra el valor de los impuestos diferentes a los relacionados anteriormente y que el ente económico debe pagar a entidades del gobierno del orden nacional, departamental, distrital o municipal.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 13,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
162 => 
array (
    'id' => 160,
    'codigo' => '2505',
    'nombre' => 'SALARIOS POR PAGAR',
    'descripcion' => 'Registra el valor a pagar a los trabajadores originados en una relación laboral, tales como sueldos, salario integral, jornales, horas extras y recargos, comisiones, viáticos, incapacidades y subsidio de transporte.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 14,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
163 => 
array (
    'id' => 161,
    'codigo' => '2510',
    'nombre' => 'CESANTÍAS CONSOLIDADAS',
    'descripcion' => 'Registra el valor de las obligaciones del ente económico con cada uno de sus trabajadores por concepto del auxilio de cesantías, como consecuencia del derecho adquirido de conformidad con las disposiciones legales vigentes y los acuerdos laborales existentes.El cálculo definitivo se debe determinar al cierre del respectivo período contable una vez efectuados los correspondientes ajustes, de acuerdo con las provisiones estimadas durante el ejercicio económico.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 14,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
164 => 
array (
    'id' => 162,
    'codigo' => '2515',
    'nombre' => 'INTERESES SOBRE CESANTÍAS',
    'descripcion' => 'Comprende el valor de los intereses causados sobre las cesantías de conformidad con las disposiciones legales vigentes.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 14,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
165 => 
array (
    'id' => 163,
    'codigo' => '2520',
    'nombre' => 'PRIMA DE SERVICIOS',
    'descripcion' => 'Registra el valor que por este concepto se encuentre pendiente de pago y a favor de los trabajadores como consecuencia del derecho adquirido de conformidad con las disposiciones legales vigentes y los acuerdos laborales existentes con el ente económico.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 14,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
166 => 
array (
    'id' => 164,
    'codigo' => '2525',
    'nombre' => 'VACACIONES CONSOLIDADAS',
    'descripcion' => 'Registra el valor acumulado de las vacaciones que el ente económico adeuda a sus trabajadores producto de la relación laboral existente, sean éstas legales o extralegales.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 14,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
167 => 
array (
    'id' => 165,
    'codigo' => '2530',
    'nombre' => 'PRESTACIONES EXTRALEGALES',
    'descripcion' => 'Registra las sumas adeudadas por el ente económico a sus trabajadores por concepto de prestaciones extralegales, es decir, de aquellas originadas en pactos colectivos o convenciones de trabajo.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 14,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
168 => 
array (
    'id' => 166,
    'codigo' => '2532',
    'nombre' => 'PENSIONES POR PAGAR',
    'descripcion' => 'Registra el valor a pagar a los pensionados, cuya obligación por este concepto está a cargo del ente económico.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 14,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
169 => 
array (
    'id' => 167,
    'codigo' => '2535',
    'nombre' => 'CUOTAS PARTES PENSIONES DE JUBILACIÓN',
    'descripcion' => 'Registra los valores correspondientes a cuotas partes pendientes de pago a ex trabajadores, entidades de previsión social o a fondos de pensiones, por concepto de pensiones de jubilación de personas que trabajaron en el ente económico.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 14,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
170 => 
array (
    'id' => 168,
    'codigo' => '2540',
    'nombre' => 'INDEMNIZACIONES LABORALES',
    'descripcion' => 'Registra el valor determinado para atender el pago de las indemnizaciones a cargo del ente económico y a favor de los ex trabajadores del mismo por la cancelación del contrato de trabajo en forma unilateral.',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 14,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
171 => 
array (
    'id' => 169,
    'codigo' => '2605',
    'nombre' => 'PARA COSTOS Y GASTOS',
    'descripcion' => 'Registra el valor de las apropiaciones mensuales efectuadas por el ente económico para atender obligaciones por concepto de costos y gastos, cuyo monto exacto se desconoce pero que para efectos contables y financieros debe causarse oportunamente, de acuerdo con estimativos realizados.',
    'ajuste' => 'MENSUAL ',
    'nativa' => true,
    'grupo_id' => 15,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
172 => 
array (
    'id' => 204,
    'codigo' => '3205',
    'nombre' => 'PRIMA  EN COLOCACIONES DE ACCIONES, CUOTAS O PARTES DE INTERES SOCIAL',
    'descripcion' => 'Registra el valor de la prima en colocación de acciones, cuotas o partes de interés social representada por el mayor importe pagado por el accionista o socio sobre el valor nominal de la acción o aporte, o sobre el costo en el evento que corresponda a recolocación de acciones, cuotas o partes de interés social propias readquiridas',
    'ajuste' => 'MENSUAL',
    'nativa' => true,
    'grupo_id' => 20,
    'created_at' => '0001-01-01 00:00:00',
    'updated_at' => '0001-01-01 00:00:00',
    'deleted_at' => NULL,
),
173 => 
array (
    'id' => 170,
    'codigo' => '2610',
    'nombre' => 'PARA OBLIGACIONES LABORALES',
'descripcion' => 'Registra el valor de las apropiaciones efectuadas por el ente económico de las obligaciones que se generan en la relación laboral, sean éstas legales, convencionales o internas que tienen una exigibilidad a corto plazo o que en ocasiones requiere de un pago inmediato, efectuadas con base en las liquidaciones de nómina y en un porcentaje adecuado sobre los salarios causados.El importe de la provisión se debe causar mensualmente teniendo en cuenta las siguientes condiciones.a) Su pago sea exigible o probable, yb) Su importe se pueda estimar razonablemente.El efecto retroactivo en el importe de las prestaciones sociales originadas por la antigüedad y el cambio en la base salarial forma parte de los resultados del respectivo período contable.El cálculo definitivo correspondiente a las obligaciones laborales que no se cancelen durante el mismo ejercicio económico en que se causan sino en fechas futuras indeterminadas, se consolidarán en las diversas subcuentas del grupo 25 -obligaciones laborales-.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 15,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
174 => 
array (
'id' => 171,
'codigo' => '2615',
'nombre' => 'PARA OBLIGACIONES FISCALES',
'descripcion' => 'Registra las deudas estimadas del ente económico para atender el pago de las obligaciones fiscales y que mensualmente se contabilizan con cargo a ganancias y pérdidas, tales como: impuesto de renta y complementarios, industria y comercio, e impuesto de vehículos.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 15,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
175 => 
array (
'id' => 172,
'codigo' => '2620',
'nombre' => 'PENSIONES DE JUBILACION ',
'descripcion' => 'Registra el valor amortizado por el ente económico, en el tiempo y forma señalados en las normas que regulan la materia, hasta que cubra el 100% del cálculo actuarial.Mediante abono a la subcuenta 262005 -cálculo actuarial pensiones de jubilación- y cargo a la subcuenta 262010 -pensiones de jubilación por amortizar (DB)-, se contabilizará el valor actual de la obligación por pensiones de jubilación que se debe registrar anualmente con base en estudios actuariales elaborados de acuerdo con las disposiciones legales vigentes.La amortización al estado de resultados se realizará mediante abonos a la subcuenta 262010 -pensiones de jubilación por amortizar- con cargo a las subcuentas 510558 ó 520558 -amortización cálculo actuarial pensiones de jubilación-, según el caso.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 15,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
176 => 
array (
'id' => 173,
'codigo' => '2625',
'nombre' => 'PARA OBRAS DE URBANISMO',
'descripcion' => 'Registra el valor constituido para las obras de urbanismo a realizar o que se están realizando en las diferentes etapas de construcciones para la venta de acuerdo con los presupuestos oficiales aprobados para tales ejecuciones.Cuenta de uso exclusivo de los entes económicos dedicados a actividades de urbanismo y/o construcción.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 15,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
177 => 
array (
'id' => 174,
'codigo' => '2630',
'nombre' => 'PARA MANTENIMIENTO Y REPARACIONES',
'descripcion' => 'Registra el valor de las apropiaciones mensuales efectuadas por el ente económico para atender obligaciones por concepto de mantenimiento y reparaciones de instalaciones, maquinarias, equipos, etc., cuyo monto exacto se desconoce pero que para efectos contables y financieros debe causarse oportunamente.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 15,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
178 => 
array (
'id' => 175,
'codigo' => '2635',
'nombre' => 'PARA CONTINGENCIAS',
'descripcion' => 'Registra el valor estimado y provisionado por el ente económico para atender pasivos, que por la ocurrencia probable de un evento, pueda originar una obligación justificable, cuantificable y confiable, con cargo a resultados, como consecuencia de actuaciones que puedan derivar en multas o sanciones de autoridades administrativas, tales como superintendencias, administración de impuestos y aduanas nacionales, tesorerías municipales y del Distrito Capital de Santafé de Bogotá por el incumplimiento de disposiciones de ley o reglamentarias.De igual forma registra el valor estimado para cubrir el importe a cargo del ente económico y a favor de terceros por indemnizaciones, por responsabilidad civil, demandas laborales, demandas por incumplimiento de contratos y otras provisiones cuya contingencia de pérdida sea probable y su valor razonablemente cuantificable. Tratándose de procesos judiciales o administrativos, deben reconocerse las contingencias en la fecha de notificación del primer acto del proceso.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 15,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
179 => 
array (
'id' => 176,
'codigo' => '2640',
'nombre' => 'PAR OBLICACIONES DE GARANTIAS',
'descripcion' => 'Registra el valor de las apropiaciones destinadas a prever el futuro pago de garantías expedidas, por el ente económico.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 15,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
180 => 
array (
'id' => 177,
'codigo' => '2695',
'nombre' => 'PROVISIONES DIVERSAS',
'descripcion' => 'Registra el valor de las apropiaciones mensuales efectuadas por el ente económico para atender obligaciones por conceptos diferentes a los especificados anteriormente, cuyo monto exacto se desconoce pero que para efectos contables y financieros debe causarse oportunamente.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 15,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
181 => 
array (
'id' => 178,
'codigo' => '2705',
'nombre' => 'INGREOS RECIBIDOS POR ANTICIPADO',
'descripcion' => 'Registra el valor de las sumas que el ente económico ha recibido por anticipado a buena cuenta por prestación de servicios, intereses, comisiones, arrendamientos y honorarios entre otros.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 16,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
182 => 
array (
'id' => 179,
'codigo' => '2710',
'nombre' => 'ABONOS DIFERIDOS ',
'descripcion' => 'Registra el monto adeudado por los reajustes efectuados a las cuotas netas pendientes, en la proporción que varíe el precio del bien adjudicado.Esta cuenta debe tener su auxiliar por cada grupo, y es de uso exclusivo de las sociedades administradoras de consorcios comerciales.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 16,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
183 => 
array (
'id' => 180,
'codigo' => '2715',
'nombre' => 'UTILIDAD DIFERIDA EN VENTAS A PLAZOS',
'descripcion' => 'Registra el valor de las utilidades por amortizar incluidas en los recaudos futuros por las enajenaciones de bienes efectuadas por el ente económico bajo la modalidad o sistema de ventas a plazos.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 16,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
184 => 
array (
'id' => 181,
'codigo' => '2720',
'nombre' => 'CREDITO POR CORRECION MONETARIA DIFERIDA',
'descripcion' => 'Registra el valor de la corrección monetaria generada por el ajuste por inflación de los activos de conformidad con las normas legales vigentes.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 16,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
185 => 
array (
'id' => 182,
'codigo' => '2725',
'nombre' => 'IMPUESTOS DIFERIDOS',
'descripcion' => 'Registra el impuesto de renta diferido por pagar, establecido de conformidad con las normas fiscales vigentes.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 16,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
186 => 
array (
'id' => 183,
'codigo' => '2805',
'nombre' => 'ANTICIPOS Y AVANCES RECIBIDOS',
'descripcion' => 'Registra las sumas de dinero recibidas por el ente económico de clientes como anticipos o avances originados en ventas, fondos para proyectos específicos, cumplimiento de contratos, convenios y acuerdos debidamente legalizados, que han de ser aplicados con la facturación o cuenta de cobro respectiva.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 17,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
187 => 
array (
'id' => 184,
'codigo' => '2810',
'nombre' => 'DEPOSITOS RECIBIDOS',
'descripcion' => 'Registra el valor de las sumas recaudadas por el ente económico de personas naturales, jurídicas o entidades oficiales, para garantizar el cumplimiento de obligaciones contractuales, de servicios, de los fondos para proyectos, inversiones específicas y otras afines.En el caso de los socios y/o accionistas corresponde a las sumas recibidas en calidad de depósitos con el fin de adquirir acciones o cuotas sociales mientras se legaliza y aprueba la emisión correspondiente.Para el caso específico de sociedades administradoras de consorcios comerciales, se incluye dentro de esta cuenta el denominado fondo de reserva, la cual se afectará conforme a las normas legales vigentes.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 17,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
188 => 
array (
'id' => 185,
'codigo' => '2815',
'nombre' => 'INGRESOS RECIBIDOS PARA TERCEROS',
'descripcion' => 'Registra los dineros recibidos por el ente económico a nombre de terceros y que en consecuencia serán reintegrados o transferidos a sus dueños en los plazos y condiciones convenidos.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 17,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
189 => 
array (
'id' => 186,
'codigo' => '2820',
'nombre' => 'CUENTAS DE OPERACION CONJUNTA',
'descripcion' => 'Registra esta cuenta los avances recibidos de las partes involucradas en la denominada "operación conjunta", en desarrollo de los contratos de asociación y participación de riesgo, que celebren entes económicos, o uno o más de éstos y la Nación, para la exploración y explotación de recursos naturales renovables y no renovables, suscritos conforme a las normas vigentes.Esta cuenta es de uso exclusivo de los entes económicos dedicados a la exploración y explotación de recursos naturales renovables y no renovables.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 17,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
190 => 
array (
'id' => 187,
'codigo' => '2825',
'nombre' => 'RETENCIONES A TERCEROS SOBRE CONTRATOS',
'descripcion' => 'Registra el valor de los descuentos efectuados por el ente económico sobre pagos parciales (cuentas de cobro), para garantizar la estabilidad de obra u otras obligaciones producto de la relación contractual.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 17,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
191 => 
array (
'id' => 188,
'codigo' => '2830',
'nombre' => 'EMBARGOS JUDICIALES',
'descripcion' => 'Registra el valor de los pasivos adquiridos por el ente económico por concepto de descuentos hechos a afiliados del ente, producto de embargos, pago de indemnizaciones, constitución de títulos de depósito judicial de acuerdo con lo ordenado por despachos judiciales cuando el afiliado o el ente tenga obligaciones eventuales ante terceros, sea por actos derivados directa o indirectamente de sus dependientes.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 17,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
192 => 
array (
'id' => 189,
'codigo' => '2835',
'nombre' => 'ACREEDORES DEL SISTEMA',
'descripcion' => 'Registra el valor de los dineros cancelados por los suscriptores de los planes que no han salido favorecidos o aquéllos que siendo favorecidos por el sistema de sorteo u oferta se encuentran pendientes de legalizar las entregas. Incluye además las sumas recibidas de los suscriptores a los cuales no se les ha podido configurar un grupo.En las respectivas subcuentas se debe llevar por separado cada uno de los grupos. Esta cuenta es de uso exclusivo de las sociedades administradoras de consorcios comerciales.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 17,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
193 => 
array (
'id' => 190,
'codigo' => '2840',
'nombre' => 'CUENTAS EN PARTICIPACION',
'descripcion' => 'Registra el valor de las obligaciones a cargo del ente económico (gestor) y a favor de cada uno de los partícipes, por concepto de liquidaciones parciales o definitivas en desarrollo de contratos de cuentas en participación, realizados conforme a las normas legales vigentes.El valor correspondiente al ente económico que opera como socio gestor y a la vez partícipe, registrará la parte que le corresponda de las utilidades en la cuenta de ingresos respectiva.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 17,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
194 => 
array (
'id' => 191,
'codigo' => '2895',
'nombre' => 'DIVERSOS',
'descripcion' => 'Registra las obligaciones a cargo del ente económico que por su naturaleza no pueden ser incluidas apropiadamente en las cuentas del pasivo descritas en el presente plan.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 17,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
195 => 
array (
'id' => 192,
'codigo' => '2905',
'nombre' => 'BONOS EN CIRCULACION',
'descripcion' => 'Registra el valor recibido de los bonos puestos en circulación por el ente económico autorizado.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 18,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
196 => 
array (
'id' => 193,
'codigo' => '2910',
'nombre' => 'BONOS OBLIGATORIAMENTE CONVERTIBLES EN ACCIONES',
'descripcion' => 'Registra el valor de las obligaciones que adquiere el ente económico, por la emisión de bonos cuyo pago deberá efectuarse mediante la entrega de un número de acciones liberadas.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 18,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
197 => 
array (
'id' => 194,
'codigo' => '2915',
'nombre' => 'PAPELES COMERCIALES',
'descripcion' => 'Registra los pagarés emitidos masiva o serialmente por el ente económico sometido a la vigilancia por parte del Estado, y que son objeto de oferta pública en el mercado de valores.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 18,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
198 => 
array (
'id' => 195,
'codigo' => '2920',
'nombre' => 'BONOS PENSIONALES',
'descripcion' => 'Registra el valor amortizado por el ente económico de los denominados bonos pensionales hasta que cubra el 100% de su valor nominal, mediante alícuotas sistemáticas hasta la fecha de su redención.Incluye además el valor de los intereses causados a favor del beneficiario del bono.Mediante abono a la subcuenta 292005 -valor bonos pensionales- y cargo a la subcuenta 292010 -bonos pensionales por amortizar (DB)-, se contabilizará el valor de los bonos pensionales.La amortización al estado de resultados se realizará mediante abonos a la subcuenta 292010 -bonos pensionales por amortizar- con cargo a las subcuentas 510561 ó 520561 -amortización bonos pensionales-, según el caso.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 18,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
199 => 
array (
'id' => 196,
'codigo' => '2925',
'nombre' => 'TITULOS PENSIONALES ',
'descripcion' => 'Registra el valor amortizado por el ente económico de los denominados títulos pensionales hasta que cubra el 100% de su valor nominal, mediante alícuotas sistemáticas hasta la fecha de su redención.Incluye además el valor de los intereses causados a favor del beneficiario del título.Mediante abono a la subcuenta 292505 -valor títulos pensionales- y cargo a la subcuenta 292510 -títulos pensionales por amortizar (DB)-, se contabilizará el valor de los títulos pensionales.La amortización al estado de resultados se realizará mediante abonos a la subcuenta 292510 -títulos pensionales por amortizar- con cargo a las subcuentas 510562 ó 520562 -amortización títulos pensionales-, según el caso.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 18,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
200 => 
array (
'id' => 197,
'codigo' => '3105',
'nombre' => 'CAPITAL SUSCRITO Y PAGADO',
'descripcion' => 'Registra el ingreso real al patrimonio del ente económico, de los aportes efectuados por los accionistas, y corresponde al valor neto de las subcuentas 310505 -capital autorizado-, 310510 -capital por suscribir (DB)- y 310515 -capital suscrito por cobrar (DB)-.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 19,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
201 => 
array (
'id' => 198,
'codigo' => '3115',
'nombre' => 'APORTES SOCIALES',
'descripcion' => 'Registra el valor de los aportes realizados por los socios al momento de constituir el ente económico respaldados por la escritura pública de constitución; así como los incrementos posteriores efectuados mediante las escrituras de reforma de estatutos correspondientes, previo el cumplimiento de los requisitos legales vigentes al momento de la constitución o del aumento.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 19,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
202 => 
array (
'id' => 218,
'codigo' => '3610',
'nombre' => 'PERDIDA DEL EJERCICIO',
'descripcion' => 'Registra el resultado negativo de las operaciones, relacionadas o no, con el objeto social, y que constituye una disminución patrimonial para el ente económico.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 24,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
203 => 
array (
'id' => 199,
'codigo' => '3120',
'nombre' => 'CAPITAL ASIGNADO',
'descripcion' => 'Registra el monto del capital asignado a las sucursales de sociedades extranjeras, señalado en la resolución o acto en donde se acordó conforme a la ley del domicilio principal, establecer negocios permanentes en Colombia, así como los aumentos debidamente legalizados.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 19,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
204 => 
array (
'id' => 200,
'codigo' => '3125',
'nombre' => 'INVERSION SUPLEMENTARIA AL CAPITAL ASIGNADO',
'descripcion' => 'Registra el valor que por este concepto reciben las sucursales de sociedades extranjeras de su casa matriz conforme a las normas legales vigentes.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 19,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
205 => 
array (
'id' => 201,
'codigo' => '3130',
'nombre' => 'CAPITAL DE PERSONAS NATURALES',
'descripcion' => 'Registra el total de derechos, reales o personales, bienes muebles o inmuebles, corporales o incorporales, apreciables en dinero y poseídos dentro o fuera del país que la persona natural ha destinado como capital para el ejercicio de las actividades de comercio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 19,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
206 => 
array (
'id' => 202,
'codigo' => '3135',
'nombre' => 'APORTES DEL ESTADO',
'descripcion' => 'Registra el valor del capital de las empresas industriales y comerciales del Estado, el cual está conformado por el asignado en el acto de creación, así como las adiciones que con posterioridad le asigne la ley.Registra también el valor de las apropiaciones recibidas del Gobierno Nacional en la ley de presupuesto.Esta cuenta es de uso exclusivo de las sociedades de economía mixta y de las empresas industriales y comerciales del Estado.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 19,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
207 => 
array (
'id' => 205,
'codigo' => '3210',
'nombre' => 'DONACIONES',
'descripcion' => 'Registra los valores acumulados que el ente económico ha recibido por concepto de donaciones de bienes y valores.Se consideran superávit de capital aquellas donaciones correspondientes a bienes y valores que incrementan el patrimonio del ente, tales como propiedades, planta y equipo. Aquellos bienes recibidos sin contraprestación económica con el fin de atender costos o gastos de funcionamiento, se registrarán en la subcuenta 429509 -subvenciones-.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 20,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
208 => 
array (
'id' => 206,
'codigo' => '3215',
'nombre' => 'CREDITO MERCANTIL',
'descripcion' => 'Registra la contrapartida o cuenta de valuación del crédito mercantil formado o estimado contabilizado en la subcuenta 160505.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 20,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
209 => 
array (
'id' => 207,
'codigo' => '3220',
'nombre' => 'KNOW HOW ',
'descripcion' => 'Registra la contrapartida o cuenta de valuación del conocimiento técnico registrado en la cuenta 1630.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 20,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
210 => 
array (
'id' => 208,
'codigo' => '3225',
'nombre' => 'SUPERAVIT METODO DE PARTICIPACION',
'descripcion' => 'Registra el valor correspondiente a la variación patrimonial por la aplicación del método de participación, de las inversiones que posee el ente económico en sociedades subordinadas, distinta a la utilidad neta o pérdida neta del ejercicio, según sea el caso presentada por tales sociedades.Este rubro no es susceptible de ser distribuido como utilidades.En el evento de abandono del método por cualquiera de las causales, el saldo de la cuenta se irá disminuyendo en la parte proporcional, y su nueva valuación se registra en las cuentas de los grupos 19 y 38.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 20,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
211 => 
array (
'id' => 209,
'codigo' => '3305',
'nombre' => 'RESERVAS OBLIGATORIAS',
'descripcion' => 'Registra los valores apropiados de las utilidades líquidas, conforme a mandatos legales, con el propósito de proteger el patrimonio social.Se incluyen conceptos tales como reserva legal, reservas por disposiciones fiscales y reservas para readquisición de acciones y de cuotas o partes de interés social.La reserval legal corresponde a la apropiación de por lo menos el 10% de las utilidades líquidas de cada ejercicio y están obligadas a constituirla las sociedades en comandita por acciones, de responsabilidad limitada, anónimas y las sucursales de sociedades extranjeras con negocios permanentes en Colombia, en los términos establecidos por la legislación comercial.Las reservas para readquisición de acciones y de cuotas o partes de interés social corresponden al valor apropiado de las utilidades líquidas para cubrir en su totalidad la adquisición de las mismas.Registra también el valor pagado por la compra de sus propias acciones, cuotas o partes de interés social, en desarrollo de la operación de readquisición aprobada previamente por el órgano competente.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 21,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
212 => 
array (
'id' => 210,
'codigo' => '3310',
'nombre' => 'RESERVAS ESTATUTARIA',
'descripcion' => 'Registra los valores de todas aquellas partidas apropiadas de acuerdo con lo contemplado en los estatutos sociales.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 21,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
213 => 
array (
'id' => 211,
'codigo' => '3315',
'nombre' => 'RESERVAS OCACIONLES',
'descripcion' => 'Registra los valores apropiados de las utilidades líquidas, ordenadas por el máximo órgano social conforme a disposiciones legales, para fines específicos y justificados.Las reservas ocasionales que ordene el máximo órgano social, sólo serán obligatorias para el ejercicio en el cual se hagan y el mismo podrá cambiar su destinación o distribuirlas cuando resulten innecesarias.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 21,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
214 => 
array (
'id' => 212,
'codigo' => '3405',
'nombre' => 'AJUSTES POR INFLACION',
'descripcion' => 'Registra el ajuste por inflación del patrimonio del ente económico, así como de los activos en período improductivo, de conformidad con las disposiciones legales vigentes. El saldo de esta cuenta forma parte del patrimonio de los períodos siguientes para efectos del cálculo del ajuste por inflación y no podrá distribuirse como utilidad a los socios o accionistas, hasta tanto se liquide el ente económico o se capitalice tal valor.El ajuste del patrimonio se determinará con base en las normas legales vigentes.En el evento que el ente económico emita acciones y/o cuotas o derechos sociales como resultado de la capitalización de algunas de las cuentas que conforman el grupo revalorización del patrimonio, deberá efectuar simultáneamente el respectivo registro en el código 8335 -capitalización por revalorización del patrimonio-; en consecuencia, los saldos que registre el ente económico en esta cuenta deberán disminuirse efectuando la contrapartida correspondiente en las cuentas 3105, 3115, 3130 ó 3135 según el caso.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 22,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
215 => 
array (
'id' => 213,
'codigo' => '3410',
'nombre' => 'SANEAMIENTO FISCAL',
'descripcion' => 'Registra el saldo que por virtud de normas legales especiales generaron ajustes a la contabilidad del ente económico, como fueron, la inclusión de activos, retiro de pasivos inexistentes y la reclasificación de provisiones subestimadas.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 22,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
216 => 
array (
'id' => 214,
'codigo' => '3415',
'nombre' => 'AJUSTES  POR INFLACION DECRETO 3019 DE 1989',
'descripcion' => 'Registra el saldo de los ajustes por inflación efectuados a propiedades, planta y equipos adquiridos entre 1989 y 1991, de conformidad con las disposiciones legales.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 22,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
217 => 
array (
'id' => 215,
'codigo' => '3505',
'nombre' => 'DIVIDENDOS DECRETADOS EN ACCIONES',
'descripcion' => 'Registra el valor apropiado de las ganancias acumuladas mientras se hace la correspondiente emisión de acciones y los pertinentes traslados a las cuentas patrimoniales.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 23,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
218 => 
array (
'id' => 216,
'codigo' => '3510',
'nombre' => 'PARTICIPACIONES DECRETADAS EN CUOTAS O PARTES DE INTERES SOCIAL',
'descripcion' => 'Registra el valor apropiado de las ganancias acumuladas mientras se corre la correspondiente escritura pública de incremento del capital social.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 23,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
219 => 
array (
'id' => 217,
'codigo' => '3605',
'nombre' => 'UTILIDAD DEL EJERCICIO',
'descripcion' => 'Registra el valor de los resultados positivos obtenidos por el ente económico, como consecuencia de las operaciones realizadas durante el período',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 24,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
220 => 
array (
'id' => 221,
'codigo' => '3805',
'nombre' => 'DE INVERSIONES',
'descripcion' => 'Registra el valor correspondiente a la valorización de las inversiones que posee el ente económico. Para el registro contable de éstas deben observarse las instrucciones dadas en la cuenta 1905 -de inversiones-.Las valorizaciones no se deben utilizar para compensar cargos o abonos aplicables a cuentas de resultados o a ganancias o pérdidas.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 26,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
221 => 
array (
'id' => 222,
'codigo' => '3810',
'nombre' => 'DE PROPIEDADES PLANTA Y EQUIPO',
'descripcion' => 'Registra la valorización del grupo propiedades, planta y equipo. Para el registro contable de estas valorizaciones deben observarse las instrucciones de la cuenta 1910 -de propiedades, planta y equipo-',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 26,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
222 => 
array (
'id' => 223,
'codigo' => '3895',
'nombre' => 'DE OTROS ACTIVOS',
'descripcion' => 'Registra el valor correspondiente a la valorización de aquellos bienes incluidos en la cuenta 1995 -de otros activos-. Para el registro contable de estas valorizaciones deben observarse las instrucciones dadas en dicha cuenta.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 26,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
223 => 
array (
'id' => 224,
'codigo' => '4105',
'nombre' => 'AGRICULTURA, GANADERIA, CAZA Y SILVICULTURA',
'descripcion' => 'Registra el valor de los ingresos obtenidos por el ente económico en la cría, levante y ceba de semovientes; siembra, cultivo y cosecha de productos que sean vendidos durante el ejercicio, y demás ingresos relacionados con la actividad agropecuaria.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 27,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
224 => 
array (
'id' => 225,
'codigo' => '4110',
'nombre' => 'PESCA',
'descripcion' => 'Registra el valor de los ingresos obtenidos por el ente económico en la venta de productos y prestación de servicios y demás actividades relacionadas con la pesca y cría de peces durante el ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 27,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
225 => 
array (
'id' => 251,
'codigo' => '4255',
'nombre' => 'INDEMNIZACIONES ',
'descripcion' => 'Registra el valor de los ingresos recibidos por el ente económico por concepto de indemnizaciones por siniestros ocurridos.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 28,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
226 => 
array (
'id' => 226,
'codigo' => '4115',
'nombre' => 'EXPLOTACION DE MINAS Y CANTERAS',
'descripcion' => 'Registra el valor de los ingresos obtenidos por el ente económico en las actividades de exploración, extracción y explotación de minas, canteras e hidrocarburos, durante el ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 27,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
227 => 
array (
'id' => 227,
'codigo' => '4120',
'nombre' => 'INDUSTRIAS MANUFACTURERAS',
'descripcion' => 'Registra el valor de los ingresos obtenidos por el ente económico en las actividades de elaboración o transformación de productos o bienes vendidos durante el ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 27,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
228 => 
array (
'id' => 228,
'codigo' => '4125',
'nombre' => 'SUMINISTRO DE ELECTRICIDAD, GAS Y AGUA',
'descripcion' => 'Registra el valor de los ingresos obtenidos por el ente económico en las actividades de generación, transmisión, distribución y venta de energía eléctrica y gas; recolección, tratamiento y distribución de agua, durante el ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 27,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
229 => 
array (
'id' => 229,
'codigo' => '4130',
'nombre' => 'CONSTRUCCION',
'descripcion' => 'Registra el valor de los ingresos obtenidos por el ente económico en las actividades de construcción y enajenación de bienes raíces durante el ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 27,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
230 => 
array (
'id' => 230,
'codigo' => '4135',
'nombre' => 'COMERCIO AL POR MAYOR Y AL POR MENOR',
'descripcion' => 'Registra el valor de los ingresos obtenidos por el ente económico en las actividades de compra, venta y reparación y/o mantenimiento de bienes o productos a los cuales no se les realiza procesos de transformación, tales como: automotores, combustibles, materias primas agropecuarias, animales vivos, alimentos, bebidas, productos textiles, prendas de vestir, calzado y enseres domésticos, durante el ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 27,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
231 => 
array (
'id' => 231,
'codigo' => '4140',
'nombre' => 'HOTELES Y RESTAURANTES',
'descripcion' => 'Registra el valor de los ingresos obtenidos por el ente económico en las actividades relacionadas con la hotelería y servicios de restaurante durante el ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 27,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
232 => 
array (
'id' => 232,
'codigo' => '4145',
'nombre' => 'TRASNPORTE, ALMACENAMIENTO Y COMUNICACIONES',
'descripcion' => 'Registra el valor de los ingresos obtenidos por el ente económico en las actividades relacionadas con el transporte de pasajeros y de carga, servicio de correo, telecomunicaciones y actividades de agencias de viajes, entre otros, percibidos durante el ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 27,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
233 => 
array (
'id' => 233,
'codigo' => '4150',
'nombre' => 'ACTIVIDAD FINANCIERA',
'descripcion' => 'Registra el valor de los ingresos obtenidos por el ente económico no sometido al control y vigilancia de la Superintendencia Bancaria, originados en la actividad financiera propia de su objeto social tales como dividendos, participaciones, intereses, comisiones, cuotas de administración y eliminación de suscriptores.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 27,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
234 => 
array (
'id' => 234,
'codigo' => '4155',
'nombre' => 'ACTIVIDADES INMOBILIARIAS, EMPRESARIALES Y DE ALQUILER',
'descripcion' => 'Registra el valor de los ingresos obtenidos por el ente económico en actividades inmobiliarias, el alquiler de maquinaria y equipo, sin operarios, procesamiento de datos, realización de estudios técnicos, actividades de consultoría y operaciones afines, entre otros, ejecutados durante el ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 27,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
235 => 
array (
'id' => 235,
'codigo' => '4160',
'nombre' => 'ENSEÑANZA',
'descripcion' => 'Registra el valor de los ingresos obtenidos por el ente económico en la prestación del servicio de formación intelectual durante el ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 27,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
236 => 
array (
'id' => 236,
'codigo' => '4165',
'nombre' => 'SERVICIOS SOCIALES Y DE SALUD',
'descripcion' => 'Registra el valor de los ingresos obtenidos por el ente económico en la prestación de servicios sociales y de salud durante el ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 27,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
237 => 
array (
'id' => 237,
'codigo' => '4170',
'nombre' => 'OTRAS ACTIVIDADES DE SERVICIOS COMUNITARIOS, SOCIALES Y PERSONALES',
'descripcion' => 'Registra el valor de los ingresos obtenidos por el ente económico en la prestación de otros servicios comunitarios, sociales y personales, durante el ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 27,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
238 => 
array (
'id' => 238,
'codigo' => '4175',
'nombre' => 'DEVOLUCIONES EN VENTAS(DB)',
'descripcion' => 'Registra el valor de las devoluciones originadas en ventas realizadas por el ente económico.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 27,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
239 => 
array (
'id' => 239,
'codigo' => '4205',
'nombre' => 'OTRAS VENTAS',
'descripcion' => 'Registra el valor de los ingresos obtenidos por el ente económico en la venta ocasional de ciertos bienes que no corresponden propiamente al desarrollo ordinario de sus operaciones, tales como de materia prima, materiales de desecho, envases y empaques y productos en remate.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 28,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
240 => 
array (
'id' => 240,
'codigo' => '4210',
'nombre' => 'FINANCIEROS',
'descripcion' => 'Registra el valor de los ingresos obtenidos por el ente económico por concepto de rendimientos de capital a través de actividades diferentes a las de su objeto social principal.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 28,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
241 => 
array (
'id' => 241,
'codigo' => '4215',
'nombre' => 'DIVIDENDOS Y PARTICIPACIONES',
'descripcion' => 'Registra el valor de los ingresos por concepto de dividendos y/o participaciones recibidas o causadas a favor del ente económico, en desarrollo de actividades de inversión de capital diferentes a las de su objeto social principal.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 28,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
242 => 
array (
'id' => 242,
'codigo' => '4218',
'nombre' => 'INGRESOS METODO DE PARTICIPACION',
'descripcion' => 'Registra el valor correspondiente a la participación en las utilidades por la aplicación del método de participación, en las inversiones que posee el ente económico en sociedades subordinadas.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 28,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
243 => 
array (
'id' => 243,
'codigo' => '4220',
'nombre' => 'ARRENDAMIENTOS',
'descripcion' => 'Registra el valor de los ingresos obtenidos por arrendamientos de las propiedades, planta y equipo del ente económico a terceros y que no corresponde al desarrollo de la actividad principal.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 28,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
244 => 
array (
'id' => 244,
'codigo' => '4225',
'nombre' => 'COMISIONES',
'descripcion' => 'Registra el valor de los ingresos no operacionales que el ente económico obtiene a título de comisiones originadas en conceptos tales como venta de seguros, derechos de autor y programación, comisiones por recaudo o inversión publicitaria.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 28,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
245 => 
array (
'id' => 245,
'codigo' => '4230',
'nombre' => 'HONORARIOS',
'descripcion' => 'Registra los ingresos causados o recibidos por servicios técnicos o profesionales prestados por el ente económico a terceros y que no corresponden al desarrollo del objeto social principal.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 28,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
246 => 
array (
'id' => 246,
'codigo' => '4235',
'nombre' => 'SERVICIOS',
'descripcion' => 'Registra los ingresos causados o recibidos por prestación de servicios diferentes al giro normal de los negocios.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 28,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
247 => 
array (
'id' => 247,
'codigo' => '4240',
'nombre' => 'UTILIDAD EN VENTA POR INVERSIONES',
'descripcion' => 'Registra la diferencia a favor del ente económico que resulta entre el precio de enajenación y el costo de las inversiones.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 28,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
248 => 
array (
'id' => 248,
'codigo' => '4245',
'nombre' => 'UTILIDAD EN VENTA DE PROPIEDADES, PLANTA Y EQUIPO',
'descripcion' => 'Registra la diferencia a favor del ente económico que resulta entre el precio de venta de las propiedades, planta y equipo y su valor en libros.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 28,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
249 => 
array (
'id' => 249,
'codigo' => '4248',
'nombre' => 'UTILIDAD EN VENTA DE OTROS BIENES',
'descripcion' => 'Registra la diferencia a favor del ente económico que resulta entre el precio de venta y el valor neto en libros, de otros bienes intangibles y otros activos.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 28,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
250 => 
array (
'id' => 250,
'codigo' => '4250',
'nombre' => 'RECUPERACIONES',
'descripcion' => 'Registra los ingresos extraordinarios originados en la recuperación de costos o gastos en el presente ejercicio, provenientes entre otros de: recuperación de activos castigados en ejercicios anteriores; reintegro de provisiones creadas en ejercicios anteriores que han quedado sin efecto por haber desaparecido o disminuido las causas que las originaron o por ser excesivas o indebidas y las devoluciones de impuestos.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 28,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
251 => 
array (
'id' => 252,
'codigo' => '4260',
'nombre' => 'PARTICIPACIONES EN CONSECIONES',
'descripcion' => 'Registra el valor de los ingresos obtenidos por el ente económico como participación en concesiones.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 28,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
252 => 
array (
'id' => 253,
'codigo' => '4265',
'nombre' => 'INGRESOS DE EJERCICIOS ANTERIORES',
'descripcion' => 'Comprende el registro de aquellos valores correspondientes a ingresos de períodos contables anteriores no contabilizados oportunamente.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 28,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
253 => 
array (
'id' => 254,
'codigo' => '4275',
'nombre' => 'DEVOLUCIONES EN OTRAS VENTAS(DB)',
'descripcion' => 'Registra el valor de las devoluciones originadas en otras ventas no operacionales realizadas por el ente económico.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 28,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
254 => 
array (
'id' => 255,
'codigo' => '4295',
'nombre' => 'DIVERSOS',
'descripcion' => 'Registra el valor de aquellos ingresos recibidos y/o causados por el ente económico por conceptos diferentes a los especificados en las cuentas anteriores, tales como: aprovechamientos, subvenciones, reclamos, sobrantes en liquidación de fletes y decoraciones.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 28,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
255 => 
array (
'id' => 256,
'codigo' => '4705',
'nombre' => 'CORRECION MONETARIA',
'descripcion' => 'Registra las partidas crédito y débito correspondientes a los ajustes por inflación, efectuados a los valores contabilizados en los rubros del balance y del estado de ganancias y pérdidas, de conformidad con las disposiciones legales vigentes.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 29,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
256 => 
array (
'id' => 257,
'codigo' => '5105',
'nombre' => 'GASTOS DE PERSONAL',
'descripcion' => 'Registra los gastos ocasionados por concepto de la relación laboral existente de conformidad con las disposiciones legales vigentes, el reglamento interno del ente económico, pacto laboral o laudo.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 30,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
257 => 
array (
'id' => 258,
'codigo' => '5110',
'nombre' => 'HONORARIOS',
'descripcion' => 'Registra los gastos ocasionados por concepto de honorarios por servicios recibidos.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 30,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
258 => 
array (
'id' => 259,
'codigo' => '5115',
'nombre' => 'IMPUESTOS',
'descripcion' => 'Registra el valor de los gastos pagados o causados por el ente económico originados en impuestos o tasas de carácter obligatorio a favor del Estado diferentes a los de renta y complementarios, de conformidad con las normas legales vigentes.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 30,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
259 => 
array (
'id' => 260,
'codigo' => '5120',
'nombre' => 'ARRENDAMIENTOS',
'descripcion' => 'Registra el valor de los gastos pagados o causados por el ente económico originados en servicios de arrendamientos de bienes, para el desarrollo del objeto social.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 30,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
260 => 
array (
'id' => 261,
'codigo' => '5125',
'nombre' => 'CONTRIBUCIONES Y AFILIASIONES',
'descripcion' => 'Registra el valor de los gastos pagados o causados por el ente económico por concepto de contribuciones, aportes, afiliaciones y/o cuotas de sostenimiento, con organismos públicos o privados por mandato legal o libre vinculación.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 30,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
261 => 
array (
'id' => 262,
'codigo' => '5130',
'nombre' => 'SEGUROS',
'descripcion' => 'Registra el valor de los gastos pagados o causados por el ente económico por concepto de seguros en sus diversas modalidades.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 30,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
262 => 
array (
'id' => 263,
'codigo' => '5135',
'nombre' => 'SERVICIOS',
'descripcion' => 'Registra el valor de los gastos pagados o causados por el ente económico por concepto de servicios tales como aseo y vigilancia, asistencia técnica, procesamiento electrónico de datos, servicios públicos, transportes, fletes y acarreos.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 30,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
263 => 
array (
'id' => 264,
'codigo' => '5140',
'nombre' => 'GASTOS LEGALES ',
'descripcion' => 'Registra el valor de los gastos pagados o causados por el ente económico en cumplimiento de disposiciones legales de carácter obligatorio tales como: gastos notariales, aduaneros y consulares, registro mercantil, trámites y licencias.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 30,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
264 => 
array (
'id' => 265,
'codigo' => '5145',
'nombre' => 'MANTENIMIENTO Y REPARACIONES',
'descripcion' => 'Registra los gastos ocasionados por concepto de mantenimiento y reparaciones que se efectúan en desarrollo del giro operativo del ente económico.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 30,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
265 => 
array (
'id' => 266,
'codigo' => '5150',
'nombre' => 'ADECUACION E INSTALACION',
'descripcion' => 'Registra los gastos ocasionados por concepto de adecuación e instalación de oficinas efectuados por el ente económico.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 30,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
266 => 
array (
'id' => 267,
'codigo' => '5155',
'nombre' => 'GASTOS DE VIAJE',
'descripcion' => 'Registra las erogaciones ocasionadas por concepto de gastos de viaje que se efectúan en desarrollo del giro normal de operaciones del ente económico.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 30,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
267 => 
array (
'id' => 268,
'codigo' => '5160',
'nombre' => 'DEPRECIACIONES',
'descripcion' => 'Registra los valores calculados por el ente económico sobre la base del costo ajustado por inflación, de acuerdo con las instrucciones señaladas en la cuenta 1592 -depreciación acumulada-.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 30,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
268 => 
array (
'id' => 269,
'codigo' => '5165',
'nombre' => 'AMORTIZACIONES',
'descripcion' => 'Registra los valores correspondientes a las amortizaciones efectuadas de conformidad con las instrucciones impartidas para los cargos diferidos.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 30,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
269 => 
array (
'id' => 270,
'codigo' => '5195',
'nombre' => 'DIVERSOS',
'descripcion' => 'Registra los gastos operacionales ocasionados por conceptos diferentes a los especificados anteriormente.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 30,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
270 => 
array (
'id' => 271,
'codigo' => '5199',
'nombre' => 'PROVISIONES',
'descripcion' => 'Registra el valor de las sumas provisionadas por el ente económico para cubrir contingencias de pérdidas probables así como también para disminuir el valor de los activos cuando sea necesario de acuerdo con las normas técnicas. Las provisiones registradas deben ser justificadas, cuantificables y verificables y se deberán efectuar de conformidad con las instrucciones impartidas para cada cuenta.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 30,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
271 => 
array (
'id' => 272,
'codigo' => '5205',
'nombre' => 'GASTOS DE PERSONAL',
'descripcion' => 'Registra los gastos ocasionados por concepto de la relación laboral existente de conformidad con las disposiciones legales vigentes, el reglamento interno del ente económico, pacto laboral o laudo.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 31,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
272 => 
array (
'id' => 273,
'codigo' => '5210',
'nombre' => 'HONORARIOS',
'descripcion' => 'Registra los gastos ocasionados por concepto de honorarios por servicios recibidos.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 31,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
273 => 
array (
'id' => 274,
'codigo' => '5215',
'nombre' => 'IMPUESTOS',
'descripcion' => 'Registra el valor de los gastos pagados o causados por el ente económico originados en impuestos o tasas de carácter obligatorio a favor del Estado diferentes a los de renta y complementarios, de conformidad con las normas legales vigentes.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 31,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
274 => 
array (
'id' => 275,
'codigo' => '5220',
'nombre' => 'ARRENDAMIENTOS',
'descripcion' => 'Registra el valor de los gastos pagados o causados por el ente económico originados en servicios de arrendamientos de bienes para el desarrollo del objeto social.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 31,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
275 => 
array (
'id' => 276,
'codigo' => '5225',
'nombre' => 'CONTRIBUCIONES Y AFILIACIONES',
'descripcion' => 'Registra el valor de los gastos pagados o causados por el ente económico originados en contribuciones, aportes, afiliaciones y/o cuotas de sostenimiento, con organismos públicos o privados por mandato legal o libre vinculación.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 31,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
276 => 
array (
'id' => 277,
'codigo' => '5230',
'nombre' => 'SEGUROS',
'descripcion' => 'Registra el valor de los gastos pagados o causados por el ente económico por concepto de seguros en sus diversas modalidades.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 31,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
277 => 
array (
'id' => 278,
'codigo' => '5235',
'nombre' => 'SERVICIOS',
'descripcion' => 'Registra el valor de los gastos pagados o causados por el ente económico por concepto de servicios tales como, aseo y vigilancia, asistencia técnica, procesamiento electrónico de datos, servicios públicos, transportes, fletes y acarreos.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 31,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
278 => 
array (
'id' => 279,
'codigo' => '5240',
'nombre' => 'GASTOS LEGALES',
'descripcion' => 'Registra el valor de los gastos pagados o causados por el ente económico en cumplimiento de disposiciones legales de carácter obligatorio tales como: gastos notariales, aduaneros y consulares, registro mercantil, trámites y licencias.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 31,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
279 => 
array (
'id' => 280,
'codigo' => '5245',
'nombre' => 'MANTENIMIENTO Y REPARACIONES',
'descripcion' => 'Registra los gastos ocasionados por concepto de mantenimiento y reparaciones que se efectúan en desarrollo del giro operativo del ente económico.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 31,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
280 => 
array (
'id' => 281,
'codigo' => '5250',
'nombre' => 'ADECUACION E INSTALACION',
'descripcion' => 'Registra los gastos ocasionados por concepto de adecuación e instalación de oficinas efectuados por el ente económico.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 31,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
281 => 
array (
'id' => 282,
'codigo' => '5255',
'nombre' => 'GASTOS DE VIAJE',
'descripcion' => 'Registra las erogaciones ocasionadas por concepto de gastos de viaje que se efectúan en desarrollo del giro operativo del ente económico.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 31,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
282 => 
array (
'id' => 283,
'codigo' => '5260',
'nombre' => 'DEPRECIACIONES',
'descripcion' => 'Registra los valores calculados por el ente económico sobre la base del costo ajustado por inflación, de acuerdo con las instrucciones señaladas en la cuenta 1592 -depreciación acumulada-.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 31,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
283 => 
array (
'id' => 284,
'codigo' => '5265',
'nombre' => 'AMORTIZACIONES',
'descripcion' => 'Registra los valores correspondientes a las amortizaciones efectuadas de conformidad con las instrucciones impartidas para los cargos diferidos.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 31,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
284 => 
array (
'id' => 285,
'codigo' => '5270',
'nombre' => 'FINANCIEROS REAJUSTE DEL SISTEMA',
'descripcion' => 'Registra el saldo débito resultante de netear la subcuenta 271005 -reajuste del sistema-, al finalizar el grupo.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 31,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
285 => 
array (
'id' => 286,
'codigo' => '5275',
'nombre' => 'PERDIDAS METODO DE PARTICIPACION',
'descripcion' => 'Registra el valor correspondiente a la participación en las pérdidas por la aplicación del método de participación, de las inversiones que posee el ente económico en sociedades subordinadas, cuando la actividad principal de este sea financiera.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 31,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
286 => 
array (
'id' => 287,
'codigo' => '5295',
'nombre' => 'DIVERSOS',
'descripcion' => 'Registra los gastos operacionales ocasionados por conceptos diferentes a los especificados anteriormente.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 31,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
287 => 
array (
'id' => 288,
'codigo' => '5299',
'nombre' => 'PROVISIONES',
'descripcion' => 'Registra el valor de las sumas provisionadas por el ente económico para cubrir contingencia de pérdidas probables así como también para disminuir el valor de los activos cuando sea necesario de acuerdo con las normas técnicas. Las provisiones registradas deben ser justificadas, cuantificables y verificables y se deberán efectuar de conformidad con las instrucciones impartidas para cada cuenta.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 31,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
288 => 
array (
'id' => 289,
'codigo' => '5305',
'nombre' => 'FINANCIEROS',
'descripcion' => 'Registra el valor de los gastos causados durante el período, en la ejecución de diversas transacciones con el objeto de obtener recursos para el cumplimiento de las actividades del ente económico o solucionar dificultades momentáneas de fondos.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 32,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
289 => 
array (
'id' => 290,
'codigo' => '5310',
'nombre' => 'PERDIDA EN VENTA Y RETIRO DE BIENES',
'descripcion' => 'Registra el valor de las pérdidas en que incurre el ente económico por la venta y retiro de bienes, tales como inversiones, cartera, propiedades, planta y equipo, intangibles y otros activos.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 32,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
290 => 
array (
'id' => 291,
'codigo' => '5313',
'nombre' => 'PERDIDAS METODO DE PARTICIPACION ',
'descripcion' => 'Registra el valor correspondiente a la participación en las pérdidas por la aplicación del método de participación, de las inversiones que posee el ente económico en sociedades subordinadas, cuando la actividad principal de éste no sea financiera.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 32,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
291 => 
array (
'id' => 292,
'codigo' => '5315',
'nombre' => 'GASTOS EXTRAORDINARIOS',
'descripcion' => 'Registra el valor de los gastos pagados o causados en que incurre el ente económico para atender operaciones diferentes a las del giro ordinario de sus actividades y que no corresponden a los conceptos enunciados en las cuentas 5305 y 5310 del presente plan, tales como costas y procesos judiciales y actividades culturales y cívicas.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 32,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
292 => 
array (
'id' => 293,
'codigo' => '5395',
'nombre' => 'GASTOS DIVERSOS',
'descripcion' => 'Registra los gastos no operacionales ocasionados por conceptos diferentes a los especificados anteriormente.',
'ajuste' => 'MENSAJE',
'nativa' => true,
'grupo_id' => 32,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
293 => 
array (
'id' => 294,
'codigo' => '5405',
'nombre' => 'IMPUESTO DE RENTA Y COMPLEMENTARIOS',
'descripcion' => 'Comprende los impuestos por concepto de renta y complementarios liquidados conforme a las normas legales vigentes.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 33,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
294 => 
array (
'id' => 295,
'codigo' => '5905',
'nombre' => 'GANANCIAS Y PERDIDAS',
'descripcion' => 'Agrupa las cuentas de resultados al cierre del ejercicio económico con el fin de establecer la utilidad o pérdida del ente económico. Su saldo podrá ser débito o crédito según el resultado obtenido.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 34,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
295 => 
array (
'id' => 296,
'codigo' => '6105',
'nombre' => 'AGRICULTURA, GANADERIA CAZA Y SIVICULTURA',
'descripcion' => 'Registra el valor de los costos incurridos por el ente económico en la cría, levante y ceba de semovientes; siembra, cultivo y cosecha de productos, y demás costos relacionados con la actividad agropecuaria, aplicados a semovientes y/o productos vendidos durante el ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 35,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
296 => 
array (
'id' => 297,
'codigo' => '6110',
'nombre' => 'PESCA',
'descripcion' => 'Registra el valor de los costos incurridos por el ente económico en las actividades del negocio de la pesca, que tengan relación de causalidad con las ventas en determinado ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 35,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
297 => 
array (
'id' => 298,
'codigo' => '6115',
'nombre' => 'EXPLOTACION DE MINAS Y CANTERAS',
'descripcion' => 'Registra el valor de los costos incurridos por el ente económico en las actividades de exploración, extracción y explotación de minas e hidrocarburos, aplicados a la producción vendida en el ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 35,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
298 => 
array (
'id' => 299,
'codigo' => '6120',
'nombre' => 'INDUSTRIAS MANOFACTURERAS',
'descripcion' => 'Registra el valor de los costos incurridos por el ente económico en las actividades de elaboración o transformación de productos o mercancías vendidas durante el ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 35,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
299 => 
array (
'id' => 300,
'codigo' => '6125',
'nombre' => 'SUMINISTRO DE ELECTRICIDAD GAS Y AGUA',
'descripcion' => 'Registra el valor de los costos incurridos por el ente económico en las actividades de generación, compra, transmisión y distribución de energía eléctrica y gas; recolección, tratamiento y distribución de agua, correspondientes a las unidades que fueron vendidas durante el ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 35,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
300 => 
array (
'id' => 301,
'codigo' => '6130',
'nombre' => 'CONSTRUCCION',
'descripcion' => 'Registra el valor de los costos incurridos por el ente económico en las actividades de adquisición, construcción y venta de bienes raíces que corresponden a unidades vendidas durante el ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 35,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
301 => 
array (
'id' => 302,
'codigo' => '6135',
'nombre' => 'COMERCIO AL POR MAYOR Y AL POR MAYOR',
'descripcion' => 'Registra el valor de los costos incurridos por el ente económico en la adquisición, manejo y enajenación de bienes o productos que no sufren transformación, tales como: automotores, materias primas agropecuarias, animales vivos, alimentos, bebidas, productos textiles, prendas de vestir, calzado y otros enseres domésticos.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 35,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
302 => 
array (
'id' => 303,
'codigo' => '6140',
'nombre' => 'HOTELES Y RESTAURANTES ',
'descripcion' => 'Registra el valor de los costos incurridos por el ente económico en las actividades de hotelería y servicios de restaurantes que tienen relación de causalidad con los ingresos percibidos durante el ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 35,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
303 => 
array (
'id' => 304,
'codigo' => '6145',
'nombre' => 'TRANSPORTE ALMACENAMIENTO Y COMUNICACIONES ',
'descripcion' => 'Registra el valor de los costos incurridos por el ente económico en las actividades de transporte de pasajeros y de carga, servicio de correo y comunicaciones, entre otros, que tienen relación de causalidad con los ingresos percibidos durante el ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 35,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
304 => 
array (
'id' => 334,
'codigo' => '9125',
'nombre' => 'PROMESAS DE COMPRAVENTA',
'descripcion' => 'Registra el valor por el cual el ente económico ha suscrito promesa de compraventa de bienes que promete comprar.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 47,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
305 => 
array (
'id' => 305,
'codigo' => '6150',
'nombre' => 'ACTIVIDAD FINANCIERA',
'descripcion' => 'Registra el valor de los costos incurridos por el ente económico no sometido al control y vigilancia de la Superintendencia Bancaria en la enajenación de inversiones durante el ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 35,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
306 => 
array (
'id' => 306,
'codigo' => '6155',
'nombre' => 'ACTIVIDADES INMOBILIARIAS EMPRESARIALES Y DE ALQUILER',
'descripcion' => 'Registra el valor de los costos incurridos por el ente económico en la enajenación de equipos y programas de informática, actividades de consultoría y operaciones afines que tienen relación de causalidad con los ingresos percibidos durante el ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 35,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
307 => 
array (
'id' => 307,
'codigo' => '6160',
'nombre' => 'ENSEÑANZA',
'descripcion' => 'Registra el valor de los costos incurridos por el ente económico en la prestación del servicio de formación intelectual que tienen relación de causalidad con los ingresos percibidos durante el ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 35,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
308 => 
array (
'id' => 308,
'codigo' => '6165',
'nombre' => 'SERVICIOS SOCIALES Y DE SALUD',
'descripcion' => 'Registra el valor de los costos incurridos por el ente económico en la prestación de servicios sociales y de salud que tienen relación de causalidad con los ingresos percibidos durante el ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 35,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
309 => 
array (
'id' => 309,
'codigo' => '6170',
'nombre' => 'OTRAS ACTIVIDADES DE SERVICIOS COMUNITARIOS SOCIALES PERSONALES',
'descripcion' => 'Registra el valor de los costos incurridos por el ente económico en la prestación de otras actividades de servicios comunitarios, sociales y personales, que tienen relación de causalidad con los ingresos percibidos durante el ejercicio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 35,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
310 => 
array (
'id' => 310,
'codigo' => '6205',
'nombre' => 'DE MERCANCIAS',
'descripcion' => 'no registra descripcion',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 36,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
311 => 
array (
'id' => 311,
'codigo' => '6210',
'nombre' => 'DE MATERIAS PRIMAS',
'descripcion' => 'no registra descripcion',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 36,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
312 => 
array (
'id' => 312,
'codigo' => '6215',
'nombre' => 'DE MATERIALES INDIRECTOS',
'descripcion' => 'no registra descripcion',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 36,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
313 => 
array (
'id' => 313,
'codigo' => '6220',
'nombre' => 'COMPRA DE ENERGIA',
'descripcion' => 'no registra descripcion',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 36,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
314 => 
array (
'id' => 314,
'codigo' => '6225',
'nombre' => 'DEVOLUCIONES DE COMPRAS(CR)',
'descripcion' => 'no registra descripcion',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 36,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
315 => 
array (
'id' => 315,
'codigo' => '8105',
'nombre' => 'BIENES Y VALORES ENTREGADOS EN CUSTODIA',
'descripcion' => 'Registra el valor de los bienes de propiedad del ente económico, entregados a terceros para su custodia y que por consiguiente siguen siendo parte de sus activos.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 41,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
316 => 
array (
'id' => 316,
'codigo' => '8110',
'nombre' => 'BIENES Y VALORES ENTREGADOS EN GARANTIA',
'descripcion' => 'Registra el importe de los bienes inmuebles, valores mobiliarios y otros bienes muebles que, siendo parte de sus activos, son entregados por el ente económico a terceros en garantía de créditos obtenidos o por otras obligaciones contraídas.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 41,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
317 => 
array (
'id' => 317,
'codigo' => '8115',
'nombre' => 'BIENES Y VALORES EN PODER DE TERCEROS',
'descripcion' => 'Registra el valor de los bienes de propiedad del ente económico entregados a terceros en calidad de arrendamiento, préstamo, comodato, depósito o consignación. Estas situaciones no implican que dichos bienes dejen de ser considerados como activos del ente económico.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 41,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
318 => 
array (
'id' => 318,
'codigo' => '8120',
'nombre' => 'LITIGIOS Y/O DEMANDAS ',
'descripcion' => 'Registra el valor de las pretensiones en denuncias penales, litigios o demandas civiles, laborales, comerciales y administrativos, entablados por el ente económico contra terceros.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 41,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
319 => 
array (
'id' => 319,
'codigo' => '8125',
'nombre' => 'PROMESAS DE COMPRAVENTA',
'descripcion' => 'Registra el valor por el cual el ente económico ha suscrito promesa de compraventa de bienes que promete vender',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 41,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
320 => 
array (
'id' => 320,
'codigo' => '8195',
'nombre' => 'DIVERSAS',
'descripcion' => 'Registra los compromisos o contratos de los cuales se pueden derivar derechos a favor del ente económico por conceptos diferentes a los especificados anteriormente.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 41,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
321 => 
array (
'id' => 321,
'codigo' => '8305',
'nombre' => 'BIENES RECIBIDOS EN ARRENDAMIENTOS FINANCIERA',
'descripcion' => 'Registra el valor de las opciones de compra por ejercer y los cánones de arrendamiento pendientes de pago, originados en la adquisición de bienes bajo la modalidad de arrendamiento financiero o leasing, cuyos derechos no se incluyen en el activo por no reunir las condiciones para ese efecto.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 43,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
322 => 
array (
'id' => 322,
'codigo' => '8310',
'nombre' => 'TITULOS DE INVERSION NO COLOCADOS',
'descripcion' => 'Registra el valor nominal de los títulos de inversión emitidos por el ente económico legalmente autorizado que aún no han sido colocados.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 43,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
323 => 
array (
'id' => 323,
'codigo' => '8315',
'nombre' => 'PROPIEDADES PLANTA Y EQUIPO TOTALMENTE DEPRECIADOS AGOTADOS Y/O AMORTIZADOS',
'descripcion' => 'Registra el valor comercial de las propiedades, planta y equipo que no obstante encontrarse totalmente depreciados, el ente económico no les ha dado de baja en libros en razón a que aún están en condiciones de uso o cambio.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 43,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
324 => 
array (
'id' => 324,
'codigo' => '8320',
'nombre' => 'CREDITOS A FAVOR NO UTILIZADOS',
'descripcion' => 'Registra el valor de las líneas de crédito individuales contratadas por el ente económico, en instituciones financieras del país o del exterior bajo las diferentes modalidades de crédito. El saldo corresponde a la porción no utilizada del crédito obtenido.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 43,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
325 => 
array (
'id' => 325,
'codigo' => '8325',
'nombre' => 'ACTIVOS CASTIGADOS',
'descripcion' => 'Registra el valor de los activos del ente económico que por considerarse incobrables o perdidos han sido castigados de conformidad con las disposiciones legales vigentes.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 43,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
326 => 
array (
'id' => 326,
'codigo' => '8330',
'nombre' => 'TITULOS DE INVERSION AMORTIZADOS',
'descripcion' => 'Registra el valor nominal de los títulos de inversión retirados del mercado por amortización o sorteo.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 43,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
327 => 
array (
'id' => 327,
'codigo' => '8335',
'nombre' => 'CAPITALIZACION POR REVALORIZACION DE PATRIMONIO',
'descripcion' => 'Registra el incremento del capital social del ente económico como consecuencia de la capitalización del grupo 34 -revalorización del patrimonio-.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 43,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
328 => 
array (
'id' => 328,
'codigo' => '8395',
'nombre' => 'OTRAS CUENTAS DEUDORAS DE CONTROL',
'descripcion' => 'Registra las operaciones por conceptos diferentes a los especificados anteriormente, entre otras, el valor asignado a los bienes en fideicomiso de acuerdo con las instrucciones indicadas en la cuenta 1245 -derechos fiduciarios-.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 43,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
329 => 
array (
'id' => 329,
'codigo' => '8399',
'nombre' => 'AJUSTES POR INFLACION ACTIVOS',
'descripcion' => 'Registra el valor de los ajustes por inflación de acuerdo con las normas legales vigentes, efectuado sobre cada uno de los activos no monetarios.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 43,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
330 => 
array (
'id' => 330,
'codigo' => '9105',
'nombre' => 'BIENES Y VALORES RECIBIDOS EN CUSTODIA',
'descripcion' => 'Registra los bienes recibidos por el ente económico para su custodia.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 47,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
331 => 
array (
'id' => 331,
'codigo' => '9110',
'nombre' => 'BIENES Y VALORES RECIBIDOS  EN GARANTIA',
'descripcion' => 'Registra el importe de los bienes inmuebles, valores mobiliarios y otros bienes inmuebles que han sido recibidos en garantía de operaciones realizadas por el ente económico, así como los valores equiparables a garantía real.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 47,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
332 => 
array (
'id' => 332,
'codigo' => '9115',
'nombre' => 'BIENES Y VALORES RECIBIDOS DE TERCEROS',
'descripcion' => 'Registra el valor de los bienes recibidos de terceros por el ente económico en calidad del arrendamiento, préstamo, comodato, depósito o consignación.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 47,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
333 => 
array (
'id' => 333,
'codigo' => '9120',
'nombre' => 'LITIGIOS Y/O DEMANDAS',
'descripcion' => 'Registra el valor de las pretensiones en denuncias penales, litigios o demandas civiles, laborales, comerciales y administrativos, entablados por terceros contra el ente económico.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 47,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
334 => 
array (
'id' => 335,
'codigo' => '9130',
'nombre' => 'CONTRATOS DE ADMINISTRACION DELEGADA',
'descripcion' => 'Registra el valor de las obligaciones, que se derivan en desarrollo de contratos de construcción suscritos bajo la modalidad de administración delegada.El valor de los bienes, producto del contrato en mención, representados en las construcciones en curso, se registrarán como contrapartida en la respectiva cuenta del grupo 94 -responsabilidades contingentes por contra-.Los ingresos por honorarios a favor del ente económico por la administración de la respectiva obra, los registrará en la cuenta 4130.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 47,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
335 => 
array (
'id' => 336,
'codigo' => '9135',
'nombre' => 'CUENTAS EN PARTICIPACION',
'descripcion' => 'Registra el valor de las responsabilidades contraídas por el ente económico, quien actúa en calidad de gestor (administrador del negocio) en la ejecución de contratos de cuentas en participación suscritos y desarrollados conforme a la legislación comercial vigente, tales como obligaciones financieras, proveedores, cuentas por pagar, aportes de los partícipes, ingresos, entre otros.Los bienes y sus respectivos valores que están bajo su responsabilidad, representados en dinero, inventarios, propiedades planta y equipo, costos, gastos, etc., se registrarán, discriminarán y controlarán en la respectiva cuenta del grupo 94 -responsabilidades contingentes por contra-.Las utilidades que le correspondan al ente económico (gestor) se deben registrar en la cuenta respectiva del grupo 41.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 47,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
336 => 
array (
'id' => 337,
'codigo' => '9195',
'nombre' => 'OTRAS RESPONSABILIDADES CONTINGENTES',
'descripcion' => 'Registra los compromisos o contratos a cargo del ente económico por conceptos diferentes a los especificados anteriormente.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 47,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
337 => 
array (
'id' => 338,
'codigo' => '9305',
'nombre' => 'CONTRATOS DE ARRENDAMIENTO FINANCIERO',
'descripcion' => 'Registra las obligaciones contractuales originadas en la adquisición de bienes bajo la modalidad de arrendamiento financiero, no reconocidas dentro del pasivo, que pueden incidir en futuros períodos.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 49,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
338 => 
array (
'id' => 339,
'codigo' => '9395',
'nombre' => 'OTRAS CUENTAS DE ORDEN ACREEDORAS DE CONTROL',
'descripcion' => 'Registra operaciones realizadas por el ente económico cuyo concepto es diferente a los especificados anteriormente.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 49,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
339 => 
array (
'id' => 340,
'codigo' => '9399',
'nombre' => 'AJUSTES POR INFLACION PATRIMONIO',
'descripcion' => 'Registra el valor de los ajustes por inflación de acuerdo con el PAAG, efectuado sobre cada una de las partidas del patrimonio que de conformidad con las disposiciones legales vigentes sean susceptibles de ajuste.',
'ajuste' => 'MENSUAL',
'nativa' => true,
'grupo_id' => 49,
'created_at' => '0001-01-01 00:00:00',
'updated_at' => '0001-01-01 00:00:00',
'deleted_at' => NULL,
),
));
        
        
    }
}
