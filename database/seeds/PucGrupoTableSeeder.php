<?php

use Illuminate\Database\Seeder;

class PucGrupoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('puc_grupo')->delete();
        
        \DB::table('puc_grupo')->insert(array (
            0 => 
            array (
                'id' => 1,
                'codigo' => '11',
                'nombre' => 'DISPONIBLE',
                'descripcion' => 'Comprende las cuentas que registran los recursos de liquidez inmediata, total o parcial con que cuenta el ente económico y puede utilizar para fines generales o específicos, dentro de los cuales podemos mencionar la caja, los depósitos en bancos y otras entidades financieras, las remesas en tránsito y los fondos.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'codigo' => '12',
                'nombre' => 'INVERSIONES',
                'descripcion' => 'Comprende las cuentas que registran las inversiones en acciones, cuotas o partes de interés social, títulos valores, papeles comerciales o cualquier otro documento negociable adquirido por el ente económico con carácter temporal o permanente, con la finalidad de mantener una reserva secundaria de liquidez, establecer relaciones económicas con otras entidades o para cumplir con disposiciones legales o reglamentarias.

Las inversiones representadas en acciones y en cuotas o partes de interés social, se registrarán por su costo histórico. Las demás inversiones, como bonos, cédulas, certificados, etc., se contabilizarán por su valor nominal. Sin embargo, en caso de presentarse diferencias entre este último y el costo histórico, con el propósito de no quebrantar la norma contable básica de "valuación o medición", tales diferencias se controlarán a través de cuentas auxiliares complementarias valuativas de la inversión, específicamente en los títulos en que se presente la diferencia. Para el efecto, se utilizarán los rubros descuento por amortizar o prima por amortizar.

El costo histórico incluye las sumas en que se incurre para la compra de la inversión, el cual, para el caso de las inversiones representadas en acciones y en cuotas o partes de interés social se ajustará mensual o anualmente, reconociendo el efecto inflacionario de conformidad con lo previsto en las disposiciones legales vigentes.

Cuando el ente económico tenga como actividad principal el de rentista de capital, al momento de vender sus inversiones deberá cargar la cuenta 6150 -actividad financiera-. Si dichas inversiones son realizadas en desarrollo de actividades secundarias, cuando el valor de la venta sea mayor que el valor en libros, la diferencia se abonará a la cuenta 4240 -utilidad en venta de inversiones-; pero si el valor de venta es menor, ésta se cargará a la respectiva cuenta de provisiones. En caso de no existir o ser insuficiente la provisión, el saldo deberá debitarse a la subcuenta 531005 -venta de inversiones-.

Cuando se posean inversiones en subordinadas, respecto de las cuales el ente económico tenga el poder de disponer que en el período siguiente le transfieran sus utilidades, deben contabilizarse bajo el método de participación, de conformidad con las disposiciones legales vigentes.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'codigo' => '13',
                'nombre' => 'DEUDORES',
                'descripcion' => 'Comprende el valor de las deudas a cargo de terceros y a favor del ente económico, incluidas las comerciales y no comerciales.

De este grupo hacen parte, entre otras, las siguientes cuentas: clientes, cuentas corrientes comerciales, cuentas por cobrar a casa matriz, cuentas por cobrar a vinculados económicos, cuentas por cobrar a socios y accionistas, aportes por cobrar, anticipos y avances, cuentas de operación conjunta, depósitos y promesas de compraventa.

En este grupo también se incluye el valor de la provisión pertinente, de naturaleza crédito, constituida para cubrir las contingencias de pérdida la cual debe ser justificada, cuantificable y confiable.

Los valores representados en moneda extranjera se deberán ajustar a la tasa de cambio representativa del mercado.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'codigo' => '14',
                'nombre' => 'INVENTARIOS',
                'descripcion' => 'Comprende todos aquellos artículos, materiales, suministros, productos y recursos renovables y no renovables, para ser utilizados en procesos de transformación, consumo, alquiler o venta dentro de las actividades propias del giro ordinario de los negocios del ente económico.

Se incorporan entre otras las siguientes cuentas: materias primas, productos en proceso, obras de construcción en curso, cultivos en desarrollo, productos terminados, semovientes, materiales, repuestos y accesorios, así como inventarios en tránsito.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'codigo' => '15',
                'nombre' => 'PROPIEDADES, PLANTA Y EQUIPO',
                'descripcion' => 'Comprende el conjunto de las cuentas que registran los bienes de cualquier naturaleza que posea el ente económico, con la intención de emplearlos en forma permanente para el desarrollo del giro normal de sus negocios o que se poseen por el apoyo que prestan en la producción de bienes y servicios, por definición no destinados para la venta en el curso normal de los negocios y cuya vida útil exceda de un año.

Las propiedades, planta y equipo deben registrarse al costo histórico, del cual forman parte los costos directos e indirectos causados hasta el momento en que el activo se encuentre en condiciones de utilización o en condiciones de puesta en marcha o enajenación, tales como los de ingeniería, supervisión, impuestos, corrección monetaria proveniente del UPAC (hoy UVR) e intereses.

Los intereses y la corrección monetaria proveniente del UPAC (hoy UVR) causados sobre obligaciones contraídas en la adquisición, forman parte del costo, salvo cuando ha concluido la etapa de puesta en marcha y tales activos se encuentren en condiciones de utilización. En este caso, los gastos financieros deben cargarse a los resultados del respectivo período contable. El costo también incluye la diferencia en cambio causada hasta la puesta en marcha del activo, originada por obligaciones en moneda extranjera contraídas en su adquisición. Sin embargo, las diferencias en cambio causadas sobre obligaciones en moneda extranjera no identificables directamente con la adquisición de activos específicos, se deben contabilizar en los resultados del período contable.

El valor de las propiedades, planta y equipo recibidas en cambio, permuta, donación, dación en pago o aporte de los propietarios, se determina por el valor convenido por las partes o mediante avalúo.

Se deben establecer criterios prácticos para el registro de los costos capitalizables por adiciones, mejoras y reparaciones de propiedades, planta y equipo, que consideren tanto la importancia de las cifras como la duración del activo, de manera que se logre una clara distinción entre aquellos que forman parte del costo del activo y los que deben llevarse a resultados. Para tal efecto se entiende por adición la inversión agregada al activo inicialmente adquirido y por mejora los cambios cualitativos del bien que no aumentan su productividad.

Las reparaciones y mejoras que aumenten la eficiencia o extiendan la vida útil del activo constituyen costo adicional.

Las erogaciones realizadas para atender el mantenimiento y las reparaciones que se realicen para la conservación de los bienes muebles e inmuebles, se deben llevar como gastos del ejercicio en que se produzcan.

En el caso del impuesto sobre las ventas que forma parte del costo debe tenerse en cuenta lo prescrito en las normas legales vigentes.

Este grupo comprende, entre otras cuentas: terrenos, materiales proyectos petroleros, construcciones en curso, maquinaria y equipos en montaje, construcciones y edificaciones, maquinaria y equipo, equipo de oficina, equipo de computación y comunicación, equipo médico-científico, equipo de hoteles y restaurantes y flota y equipo de transporte.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'codigo' => '16',
                'nombre' => 'INTANGIBLES',
                'descripcion' => 'Comprende el conjunto de bienes inmateriales, representados en derechos, privilegios o ventajas de competencia que son valiosos porque contribuyen a un aumento en ingresos o utilidades por medio de su empleo en el ente económico; estos derechos se compran o se desarrollan en el curso normal de los negocios.

Dentro de este grupo se incluyen conceptos tales como: crédito mercantil, marcas, patentes, concesiones y franquicias, derechos, know how y licencias.

Por regla general, son objeto de amortización gradual durante la vida útil estimada.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 19,
                'codigo' => '31',
                'nombre' => 'CAPITAL SOCIAL',
                'descripcion' => 'Comprende el valor total de los aportes iniciales y los posteriores aumentos o disminuciones que los socios, accionistas, compañías o aportantes, ponen a disposición del ente económico mediante cuotas, acciones, monto asignado o valor aportado, respectivamente, de acuerdo con escrituras públicas de constitución o reformas, suscripción de acciones según el tipo de sociedad, asociación o negocio, con el lleno de los requisitos legales.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 7,
                'codigo' => '17',
                'nombre' => 'DIFERIDOS',
                'descripcion' => 'Comprende el conjunto de cuentas representadas en el valor de los gastos pagados por anticipado en que incurre el ente económico en el desarrollo de su actividad, así como aquellos otros gastos comúnmente denominados cargos diferidos, que representan bienes o servicios recibidos, de los cuales se espera obtener beneficios económicos en otros períodos futuros.

Comprende los gastos pagados por anticipado, tales como, intereses, primas de seguro, arrendamientos, contratos de mantenimiento, honorarios, comisiones y los gastos incurridos de organización y preoperativos, remodelaciones o adecuaciones, mejoras de oficina, estudios y proyectos, construcciones en propiedades ajenas tomadas en arrendamiento, contratos de ejecución, contribuciones y afiliaciones e impuestos diferibles.

Son objeto de amortización o extinción gradual correspondiente a las alícuotas mensuales resultantes del tiempo en que se considera se va a utilizar o recibir el beneficio del activo diferido, bien sea mediante un crédito directo a la partida de activo o por medio de una cuenta de valuación, con cargo a resultados.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 8,
                'codigo' => '18',
                'nombre' => 'OTROS ACTIVOS',
                'descripcion' => 'Comprende aquellos bienes para los cuales no se mantiene una cuenta individual y no es posible clasificarlos dentro de las cuentas de activo claramente definidas en el presente plan, tales como: antigüedades, pinturas, objetos de arte.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 9,
                'codigo' => '19',
                'nombre' => 'VALORIZACIONES',
            'descripcion' => 'Comprende la utilidad potencial (no realizad|a) medida como la diferencia entre el costo en libros de las inversiones y el valor intrínseco o el de cotización en bolsa de las mismas. Para las propiedades, planta y equipo, corresponde a la diferencia entre el costo neto y el avalúo comercial; para los semovientes será la diferencia entre el costo neto en libros y el actualizado a 31 de diciembre de cada año de acuerdo con el valor dado por el Ministerio de Agricultura o por avalúo técnico.

Las contrapartidas de las diferentes cuentas y subcuentas de este grupo, se registran en las cuentas y subcuentas respectivas del grupo 38 -superávit por valorizaciones-.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 10,
                'codigo' => '21',
                'nombre' => 'OBLIGACIONES FINANCIERAS',
            'descripcion' => 'Comprende el valor de las obligaciones contraídas por el ente económico mediante la obtención de recursos provenientes de establecimientos de crédito o de otras instituciones financieras u otros entes distintos de los anteriores, del país o del exterior, también incluye los compromisos de recompra de inversiones y cartera negociada.Por regla general, las obligaciones contraídas generan intereses y otros rendimientos a favor del acreedor y a cargo del deudor por virtud del crédito otorgado, los cuales se deben registrar por separado.Las obligaciones financieras representadas en moneda extranjera, en UPAC (hoy UVR) o con pacto de reajuste, se deben reexpresar de acuerdo con las disposiciones legales vigentes.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 2,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 11,
                'codigo' => '22',
                'nombre' => 'PROOVEDORES',
                'descripcion' => 'Comprende el valor de las obligaciones a cargo del ente económico, por concepto de la adquisición de bienes y/o servicios para la fabricación o comercialización de los productos para la venta, en desarrollo de las operaciones relacionadas directamente con la explotación del objeto social, tales como, materias primas, materiales, combustibles, suministros, contratos de obra y compra de energía.Las obligaciones con proveedores representadas en moneda extranjera o con pacto de reajuste se deben ajustar de acuerdo con las disposiciones legales vigentes.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 2,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 12,
                'codigo' => '23',
                'nombre' => 'CUENTAS POR PAGAR',
                'descripcion' => 'Comprende las obligaciones contraídas por el ente económico a favor de terceros por conceptos diferentes a los proveedores y obligaciones financieras tales como cuentas corrientes comerciales, a casa matriz, a compañías vinculadas, a contratistas, órdenes de compra por utilizar, costos y gastos por pagar, instalamentos por pagar, acreedores oficiales, regalías por pagar, deudas con accionistas o socios, dividendos o participaciones por pagar, retención en la fuente, retenciones y aportes de nómina, cuotas por devolver y acreedores varios.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 2,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 13,
                'codigo' => '24',
                'nombre' => 'IMPUESTOS, GRAVÁMENES Y TASAS',
                'descripcion' => 'Comprende el valor de los gravámenes de carácter general y obligatorios a favor del Estado y a cargo del ente económico por concepto de los cálculos con base en las liquidaciones privadas sobre las respectivas bases impositivas generadas en el período fiscal.Comprende entre otros los impuestos de renta y complementarios, sobre las ventas, de industria y comercio, de licores, cervezas y cigarrillos, de valorizaciones, de turismo y de hidrocarburos y minas.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 2,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 14,
                'codigo' => '25',
                'nombre' => 'OBLIGACIONES LABORALES',
                'descripcion' => 'Comprende el valor de los pasivos a cargo del ente económico y a favor de los trabajadores, ex trabajadores o beneficiarios, originados en virtud de normas legales, convenciones de trabajo o pactos colectivos, tales como: salarios por pagar, cesantías consolidadas, primas de servicios, prestaciones extralegales e indemnizaciones laborales.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 2,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 15,
                'codigo' => '26',
                'nombre' => 'PASIVOS ESTIMADOS Y PROVISIONES',
                'descripcion' => 'Comprende los valores provisionados por el ente económico por concepto de obligaciones para costos y gastos tales como, intereses, comisiones, honorarios, servicios, así como para atender acreencias laborales no consolidadas determinadas en virtud de la relación con sus trabajadores; igualmente para multas, sanciones, litigios, indemnizaciones, demandas, imprevistos, reparaciones y mantenimiento.Cuando se establezca que una provisión es excesiva o ha sido constituida en forma indebida, la reversión de la provisión se abonará a la subcuenta 425035 -reintegro provisiones- cuando corresponda a ejercicios anteriores, o restando de los cargos si corresponde al mismo ejercicio.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 2,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 16,
                'codigo' => '27',
                'nombre' => 'DIFERIDOS',
                'descripcion' => 'Comprende el valor de los ingresos no causados recibidos de clientes, los cuales tienen el carácter de pasivo, que debido a su origen y naturaleza han de influir económicamente en varios ejercicios, en los que deben ser aplicados o distribuidos.Igualmente registra el monto adeudado por el reajuste a las cuotas netas, para el caso de las sociedades administradoras de consorcios comerciales, la utilidad diferida en ventas a plazos, y los impuestos diferidos.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 2,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 17,
                'codigo' => '28',
                'nombre' => 'OTROS PASIVOS',
                'descripcion' => 'Comprende el conjunto de cuentas que se derivan de obligaciones a cargo del ente económico, contraídas en desarrollo de actividades que por su naturaleza especial no pueden ser incluidas apropiadamente en los demás grupos del pasivo.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 2,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 18,
                'codigo' => '29',
                'nombre' => 'BONOS Y PAPELES COMERCIALES',
                'descripcion' => 'Comprende los valores recibidos por el ente económico por concepto de emisión y venta de bonos ordinarios o convertibles en acciones, así como los papeles comerciales definidos como valores de contenido crediticio emitidos por empresas comerciales, industriales y de servicios con el propósito de financiar capital de trabajo.La prima o descuento en la colocación de bonos por valor superior o inferior al valor nominal de los títulos, se contabilizará por separado. La amortización del descuento o de la prima se debe hacer en forma sistemática en las fechas estipuladas para la causación de los intereses, con cargo o crédito a las cuentas de intereses.Así mismo, este grupo incluye los denominados "bonos pensionales" y "títulos pensionales", emitidos por el ente económico originados en la expedición de las normas sobre seguridad social.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 2,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'codigo' => '32',
                'nombre' => 'SUPERAVIT DE CAPITAL',
                'descripcion' => 'Comprende el valor de las cuentas que reflejan el incremento patrimonial ocasionado por prima en colocación de acciones, cuotas o partes de interés social, las donaciones, el crédito mercantil, el know how y el superávit método de participación.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'codigo' => '33',
                'nombre' => 'RESERVAS',
                'descripcion' => 'Comprenden los valores que por mandato expreso del máximo órgano social, se han apropiado de las utilidades líquidas de ejercicios anteriores obtenidas por el ente económico, con el objeto de cumplir disposiciones legales, estatutarias o para fines específicos.Las pérdidas se enjugarán con las reservas que hayan sido destinadas especialmente para ese propósito y, en su defecto, con la reserva legal. Las reservas cuya finalidad fuere la de absorber determinadas pérdidas no se podrán emplear para cubrir otras distintas, salvo que así lo decida el máximo órgano social.Si la reserva legal fuere insuficiente para enjugar el déficit de capital, se aplicarán a este fin los beneficios sociales de los ejercicios siguientes, tal como lo establecen las normas legales.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'codigo' => '34',
                'nombre' => 'REVALORIZACION DEL PATRIMONIO ',
                'descripcion' => 'Comprende el valor del incremento patrimonial por concepto y de los saldos originados en saneamientos fiscales, realizados conforme a las normas legales vigentes.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'codigo' => '35',
                'nombre' => 'DIVIDENDOS O PARTICIPACIONES DECRETADOS EN ACCIONES, CUOTAS O PARTES DE INTERES SOCIAL',
                'descripcion' => 'Comprende el valor apropiado de las ganancias acumuladas mientras se hace la correspondiente emisión de acciones y/o la respectiva escritura de reforma del ente económico por cuotas o partes de interés social y los pertinentes traslados en las respectivas cuentas patrimoniales.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'codigo' => '36',
                'nombre' => 'RESULTADOS DEL EJERCICIO',
                'descripcion' => 'Comprende el valor de las utilidades o pérdidas obtenidas por el ente económico al cierre de cada ejercicio.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'codigo' => '37',
                'nombre' => 'RESULTADOS DE EJERCICIOS ANTERIORES',
                'descripcion' => 'Comprende el valor de los resultados obtenidos en ejercicios anteriores, por utilidades acumuladas que estén a disposición del máximo órgano social o por pérdidas acumuladas no enjugadas.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'codigo' => '38',
                'nombre' => 'SUPERAVIT POR VALORIZACIONES',
                'descripcion' => 'Comprende la valorización de inversiones, propiedades, planta y equipo así como de otros activos sujetos de valorización. Para el registro contable de las valorizaciones deben observarse las instrucciones del grupo 19 valorizaciones.Las contrapartidas de las diferentes cuentas y subcuentas de este grupo, se registran en las cuentas y subcuentas respectivas del grupo 19 -valorizaciones-.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 3,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'codigo' => '41',
                'nombre' => 'OPERACIONALES',
                'descripcion' => 'Comprende los valores recibidos y/o causados como resultado de las actividades desarrolladas en cumplimiento de su objeto social mediante la entrega de bienes o servicios, así como los dividendos, participaciones y demás ingresos por concepto de intermediación financiera, siempre y cuando se identifique con el objeto social principal del ente económico.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 4,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'codigo' => '42',
                'nombre' => 'NO OPERACIONALES',
                'descripcion' => 'Comprende los ingresos provenientes de transacciones diferentes a los del objeto social o giro normal de los negocios del ente económico e incluye entre otros, los ítem relacionados con operaciones de carácter financiero en moneda nacional o extranjera, arrendamientos, servicios, honorarios, utilidad en venta de propiedades, planta y equipo e inversiones, dividendos y participaciones, indemnizaciones, recuperaciones de deducciones e ingresos de ejercicios anteriores.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 4,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'codigo' => '47',
                'nombre' => 'AJUSTES POR INFLACION',
                'descripcion' => 'Registra la contrapartida de la aplicación del sistema de ajustes por inflación para los diferentes rubros que conforman los estados financieros con sujeción a las normas y procedimientos establecidos por las disposiciones legales vigentes.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 4,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'codigo' => '51',
                'nombre' => 'OPERACIONALES DE ADMINISTRACION',
                'descripcion' => 'Los gastos operacionales de administración son los ocasionados en el desarrollo del objeto social principal del ente económico y registra, sobre la base de causación, las sumas o valores en que se incurre durante el ejercicio, directamente relacionados con la gestión administrativa encaminada a la dirección, planeación, organización de las políticas establecidas para el desarrollo de la actividad operativa del ente económico incluyendo básicamente las incurridas en las áreas ejecutiva, financiera, comercial, legal y administrativa.Se clasifican bajo el grupo de gastos operacionales de administración, por conceptos tales como honorarios, impuestos, arrendamientos y alquileres, contribuciones y afiliaciones, seguros, servicios y provisiones.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'codigo' => '52',
                'nombre' => 'OPERACIONALES DE VENTAS',
                'descripcion' => 'Comprende los gastos ocasionados en el desarrollo principal del objeto social del ente económico y se registran, sobre la base de causación, las sumas o valores en que se incurre durante el ejercicio, directamente relacionados con la gestión de ventas encaminada a la dirección, planeación, organización de las políticas establecidas para el desarrollo de la actividad de ventas del ente económico incluyendo básicamente las incurridas en las áreas ejecutiva, de distribución, mercadeo, comercialización, promoción, publicidad y ventas.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'codigo' => '53',
                'nombre' => 'NO OPERACIONALES',
                'descripcion' => 'Comprende las sumas pagadas y/o causadas por gastos no relacionados directamente con la explotación del objeto social del ente económico. Se incorporan conceptos tales como: financieros, pérdidas en venta y retiro de bienes, gastos extraordinarios y gastos diversos',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'codigo' => '54',
                'nombre' => 'IMPUESTO DE RENTA Y COMPLEMENTARIOS  ',
                'descripcion' => 'Comprende los impuestos por concepto de renta y complementarios liquidados conforme a las normas legales vigentes.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'codigo' => '59',
                'nombre' => 'GANANCIAS Y PERDIDAS',
                'descripcion' => 'Agrupa las cuentas de resultados al cierre del ejercicio económico con el fin de establecer la utilidad o pérdida del ente económico. Su saldo podrá ser débito o crédito según el resultado obtenido.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 5,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'codigo' => '61',
                'nombre' => 'COSTOS DE VENTA Y DE PRESTACION DE SERVICIOS',
                'descripcion' => 'Comprende el monto asignado por el ente económico a los artículos y productos vendidos y a los servicios prestados durante el ejercicio contable.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 6,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'codigo' => '62',
                'nombre' => 'COMPRAS',
                'descripcion' => 'Comprende el valor pagado y/o causado por el ente económico en la adquisición de materias primas, materiales indirectos y mercancías para ser utilizadas en la producción y/o comercialización en desarrollo de la actividad social principal, durante un período determinado.Al final del ejercicio económico las cuentas de compras se cancelarán con cargo a la respectiva cuenta del grupo 61 -costo de ventas y de prestación de servicios, según la actividad realizada por el ente económico.La cuenta 6220 -compra de energía, es de uso exclusivo de los entes económicos que prestan el servicio de suministro de energía eléctrica.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 6,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'codigo' => '71',
                'nombre' => 'MATERIA PRIMA',
                'descripcion' => 'Registra el valor de las materias primas, o materiales utilizados en el proceso de producción o fabricación de los bienes destinados para la venta, los cuales guardan una relación directa con el producto, bien sea por la fácil asignación o lo relevante de su valor.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 7,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'codigo' => '72',
                'nombre' => 'MANO DE OBRA DIRECTO',
                'descripcion' => 'Registra el valor de los salarios y demás prestaciones sociales incurridos directamente en el proceso de elaboración o producción de bienes o la prestación de servicios.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 7,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'codigo' => '73',
                'nombre' => 'COSTOS INDIRECTOS',
                'descripcion' => 'Registra el valor de los materiales indirectos, mano de obra indirecta y demás costos aplicables al proceso de elaboración o producción de bienes o la prestación de servicios.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 7,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'codigo' => '74',
                'nombre' => 'CONTRATOS DE SERVICIOS',
                'descripcion' => 'Registra el valor del costo de servicios recibidos en desarrollo de contratos celebrados por el ente económico con personas naturales y/o jurídicas, a fin de ejecutar labores relacionadas con la elaboración o producción de bienes o la prestación de servicios.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 7,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'codigo' => '81',
                'nombre' => 'DERECHOS CONTINGENTES',
                'descripcion' => 'Comprende el registro de los compromisos o contratos de los cuales se pueden derivar derechos.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 8,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'codigo' => '82',
                'nombre' => 'DEUDORAS FISCALES',
                'descripcion' => 'Registra las diferencias existentes entre el valor de las cuentas de naturaleza activa según la contabilidad y las de igual naturaleza utilizadas para propósitos de declaraciones tributarias. Comprende conceptos tales como diferencias entre costo contable y fiscal, pérdidas fiscales por amortizar y exceso entre renta presuntiva y renta líquida por amortizar',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 8,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'codigo' => '83',
                'nombre' => 'DEUDORAS DE CONTROL',
                'descripcion' => 'Comprende el registro de operaciones realizadas con terceros a favor del ente económico que por su naturaleza no afectan su situación financiera. Se usan también para ejercer control interno.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 8,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'codigo' => '84',
            'nombre' => 'DERECHOS CONTINGENTES POR CONTRA (CR)',
                'descripcion' => 'Registra las contrapartidas de las cuentas que conforman el grupo 81 -derechos contingentes-.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 8,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'codigo' => '85',
                'nombre' => 'DEUDORAS FISCALES POR CONTRA',
                'descripcion' => 'Registra las contrapartidas de las cuentas que conforman el grupo 82 -deudoras fiscales-.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 8,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'codigo' => '86',
                'nombre' => 'DEUDORAS DE CONTROL POR CONTRA',
                'descripcion' => 'Registra las contrapartidas de las cuentas que conforman el grupo 83 -deudoras de control-.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 8,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'codigo' => '91',
                'nombre' => 'RESPONSABILIDADES CONTINGENTES',
                'descripcion' => 'Comprende los compromisos o contratos de los cuales se pueden derivar obligaciones a cargo del ente económico.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 9,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'codigo' => '92',
                'nombre' => 'ACREEDORAS FISCALES',
                'descripcion' => 'Comprende el valor de las diferencias existentes entre las cuentas de naturaleza crédito, según la contabilidad, y las de igual naturaleza utilizadas para propósitos de declaraciones tributarias, entre las cuales se pueden mencionar las originadas en depreciaciones, diferidos.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 9,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'codigo' => '93',
                'nombre' => 'ACREEDORAS DE CONTROL',
                'descripcion' => 'Comprende el registro de operaciones a cargo del ente económico que por su naturaleza no afectan su situación financiera. Se usan también para ejercer control interno.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 9,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'codigo' => '94',
            'nombre' => 'RESPONSABILIDADES CONTINGENTES POR CONTRA (DB)',
                'descripcion' => 'Registra las contrapartidas de las cuentas que conforman el grupo 91 -responsabilidades contingentes-.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 9,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'codigo' => '95',
            'nombre' => 'ACREEDORAS FISCALES POR CONTRA (DB)',
                'descripcion' => 'Registra las contrapartidas de las cuentas que conforman el grupo 92 -acreedoras fiscales-.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 9,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'codigo' => '96',
            'nombre' => 'ACREEDORAS DE CONTROL POR CONTRA (DB)',
                'descripcion' => 'Registra las contrapartidas de las cuentas que conforman el grupo 93 -acreedoras de control-.',
                'ajuste' => 'MENSUAL',
                'nativa' => true,
                'clase_id' => 9,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
