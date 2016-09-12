<?php

use Illuminate\Database\Seeder;

class PcClaseTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pc_clase')->delete();
        
        \DB::table('pc_clase')->insert(array (
            0 => 
            array (
                'id' => 10,
                'codigo' => '1',
                'nombre' => 'ACTIVO',
                'descripcion' => 'NN',
                'ajuste' => 'NN',
                'naturaleza' => 'NN',
                'tipo' => 'NIIF',
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 11,
                'codigo' => '2',
                'nombre' => 'PASIVO',
                'descripcion' => 'NN',
                'ajuste' => 'NN',
                'naturaleza' => 'NN',
                'tipo' => 'NIIF',
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 12,
                'codigo' => '3',
                'nombre' => 'PATRIMONIO',
                'descripcion' => 'NN',
                'ajuste' => 'NN',
                'naturaleza' => 'NN',
                'tipo' => 'NIIF',
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 13,
                'codigo' => '4',
                'nombre' => 'INGRESOS',
                'descripcion' => 'NN',
                'ajuste' => 'NN',
                'naturaleza' => 'NN',
                'tipo' => 'NIIF',
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 14,
                'codigo' => '5',
                'nombre' => 'GASTO',
                'descripcion' => 'NN',
                'ajuste' => 'NN',
                'naturaleza' => 'NN',
                'tipo' => 'NIIF',
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 15,
                'codigo' => '6',
                'nombre' => 'COSTOS DE VENTAS',
                'descripcion' => 'NN',
                'ajuste' => 'NN',
                'naturaleza' => 'NN',
                'tipo' => 'NIIF',
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 16,
                'codigo' => '7',
                'nombre' => 'COSTOS DE PRODUCCIÓN O DE OPERACIÓN',
                'descripcion' => 'NN',
                'ajuste' => 'NN',
                'naturaleza' => 'NN',
                'tipo' => 'NIIF',
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 1,
                'codigo' => '1',
                'nombre' => 'ACTIVO',
                'descripcion' => 'Agrupa el conjunto de las cuentas que representan los bienes y derechos tangibles e intangibles de propiedad del ente económico, que en la medida de su utilización, son fuente potencial de beneficios presentes o futuros. Comprende los siguientes grupos: el disponible, las inversiones, los deudores, los inventarios, las propiedades, planta y equipo, los intangibles, los diferidos, los otros activos y las valorizaciones.

Las cuentas que integran esta clase tendrán saldo de naturaleza débito, con excepción de las provisiones, las depreciaciones, el agotamiento y las amortizaciones acumuladas, que serán deducidas, de manera separada, de los correspondientes grupos de cuentas.',
                'ajuste' => 'MENSUAL',
                'naturaleza' => 'DEBITO',
                'tipo' => 'LOCAL',
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 2,
                'codigo' => '2',
                'nombre' => 'PASIVOS',
            'descripcion' => 'Agrupa el conjunto de las cuentas que representan las obligaciones contraídas por el ente económico en desarrollo del giro ordinario de su actividad, pagaderas en dinero, bienes o en servicios.Comprende las obligaciones financieras, los proveedores, las cuentas por pagar, los impuestos, gravámenes y tasas, las obligaciones laborales, los diferidos, otros pasivos, los pasivos estimados, provisiones, los bonos y papeles comerciales.Las cuentas que integran esta clase tendrán siempre saldos de naturaleza crédito.Los pasivos expresados en moneda extranjera el último día del mes o año, se ajustarán con base en la tasa de cambio representativa del mercado a esa fecha, registrando tal ajuste como un mayor valor del pasivo con cargo a los resultados del ejercicio, salvo cuando deba activarse.Los pasivos en UPAC (hoy UVR) o con pacto de reajuste registrados en el último día del período se ajustarán con base en la cotización de la UPAC (hoy UVR) para esa fecha o en el respectivo pacto de reajuste, contabilizándolo como mayor valor del pasivo, con cargo a los resultados del ejercicio, salvo cuando deba activarse.',
                'ajuste' => 'MENSUAL',
                'naturaleza' => 'CREDITO',
                'tipo' => 'LOCAL',
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 3,
                'codigo' => '3',
                'nombre' => 'PATRIMONIO',
                'descripcion' => 'Agrupa el conjunto de las cuentas que representan el valor residual de comparar el activo total menos el pasivo externo, producto de los recursos netos del ente económico que han sido suministrados por el propietario de los mismos, ya sea directamente o como consecuencia del giro ordinario de sus negocios. Comprende los aportes de los accionistas, socios o propietarios, el superávit de capital, reservas, la revalorización de patrimonio, los dividendos o participaciones decretados en acciones, cuotas o partes de interés social, los resultados del ejercicio, resultados de ejercicios anteriores y el superávit por valorizaciones.',
                'ajuste' => 'MENSUAL',
                'naturaleza' => 'CREDITO',
                'tipo' => 'LOCAL',
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 4,
                'codigo' => '4',
                'nombre' => 'INGRESOS',
                'descripcion' => 'Agrupa las cuentas que representan los beneficios operativos y financieros que percibe el ente económico en el desarrollo del giro normal de su actividad comercial en un ejercicio determinado.

Mediante el sistema de causación se registrarán como beneficios realizados y en consecuencia deben abonarse a las cuentas de ingresos los causados y no recibidos. Se entiende causado un ingreso cuando nace el derecho a exigir su pago, aunque no se haya hecho efectivo el cobro.

Al final del ejercicio económico las cuentas de ingresos se cancelarán con abono al grupo 59 -ganancias y pérdidas-.

Los ingresos se registrarán en moneda funcional, es decir en pesos, de suerte que las transacciones en moneda extranjera u otra unidad de medida deben ser reconocidas en moneda funcional utilizando la tasa de conversión, tasa de cambio o UPAC (hoy UVR) aplicable a la fecha de su ocurrencia, de acuerdo con el origen de la operación que los genera.

Los ingresos se clasifican en operacionales y no operacionales.',
                'ajuste' => 'MENSUAL',
                'naturaleza' => 'CREDITO',
                'tipo' => 'LOCAL',
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 5,
                'codigo' => '5',
                'nombre' => 'GASTOS',
            'descripcion' => 'Agrupa las cuentas que representan los cargos operativos y financieros en que incurre el ente económico en el desarrollo del giro normal de su actividad en un ejercicio económico determinado.Mediante el sistema de causación se registrará con cargo a las cuentas del estado de resultados los gastos causados pendientes de pago. Se entiende causado un gasto cuando nace la obligación de pagarlo aunque no se haya hecho efectivo el pago.Al final del ejercicio económico las cuentas de gastos se cancelarán con cargo al grupo 59 -ganancias y pérdidas-.Los gastos se registrarán en moneda nacional, es decir en pesos, de suerte que las transacciones en moneda extranjera u otra unidad de medida deben ser reconocidos en moneda funcional, utilizando la tasa de conversión, tasa de cambio UPAC (hoy UVR) (aplicable en la fecha de su ocurrencia, de acuerdo con el origen de la operación que los genera.Los gastos se clasifican en operacionales y no operacionales.',
                'ajuste' => 'MENSUAL',
                'naturaleza' => 'DEBITO',
                'tipo' => 'LOCAL',
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 6,
                'codigo' => '6',
                'nombre' => 'COSTOS DE VENTA',
                'descripcion' => 'Agrupa las cuentas que representan la acumulación de los costos directos e indirectos necesarios en la elaboración de productos y/o prestación de los servicios vendidos, de acuerdo con la actividad social desarrollada por el ente económico, en un período determinado.Al final del ejercicio económico, los saldos de las cuentas de costo de ventas se cancelarán con cargo a la cuenta 5905 -ganancias y pérdidas-.',
                'ajuste' => 'MENSUAL',
                'naturaleza' => 'DEBITO',
                'tipo' => 'LOCAL',
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 7,
                'codigo' => '7',
                'nombre' => 'COSTOS DE PRODUCCION O DE OPERACION',
            'descripcion' => 'Agrupa el conjunto de las cuentas que representan las erogaciones y cargos asociados clara y directamente con la elaboración o la producción de los bienes o la prestación de servicios, de los cuales un ente económico obtiene sus ingresos. Comprende los siguientes grupos: materia prima, mano de obra directa, costos indirectos y contratos de servicios.Las cuentas que integran esta clase tendrán siempre saldo de naturaleza débito, los cuales al finalizar el período (mes), deberán cancelarse contra las cuentas del grupo 14 -inventarios-, tanto en proceso como en producto terminado, según sea el caso, para aquellos entes que utilizan como método de contabilización el sistema de inventario permanente.El ente económico que utilice el sistema de inventario periódico, registrará en esta clase el valor de la mano de obra directa (grupo 72), los costos indirectos sin incluir los materiales indirectos (grupo 73) y los costos en contratos de servicios (grupo 74), los cuales al final del ejercicio se cancelarán contra las cuentas de inventarios (grupo 14) y/o costo de ventas o de prestación de servicios (grupo 61).También se registran en esta clase, para efectos de control, los costos correspondientes a las otras ventas registradas en la cuenta 4205.',
                'ajuste' => 'MENSUAL',
                'naturaleza' => 'DEBITO',
                'tipo' => 'LOCAL',
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 8,
                'codigo' => '8',
                'nombre' => 'CUENTAS DE ORDEN DEUDORAS ',
                'descripcion' => 'Agrupa las cuentas que reflejan hechos o circunstancias de los cuales se pueden generar derechos afectando la estructura financiera del ente económico. Igualmente, se incluyen aquellas cuentas de registro utilizadas para efectos del control interno de activos, información gerencial o control de futuras situaciones financieras, así como para conciliar las diferencias entre los registros contables de los activos y las declaraciones tributarias.',
                'ajuste' => 'MENSUAL',
                'naturaleza' => 'DEBITO',
                'tipo' => 'LOCAL',
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 9,
                'codigo' => '9',
                'nombre' => 'CUENTAS DE ORDEN ACREEDORAS',
                'descripcion' => 'Agrupa las cuentas que registran los compromisos o contratos que se relacionan con posibles obligaciones y que por tanto puedan llegar a afectar la estructura financiera del ente económico. Igualmente, se incluyen aquellas cuentas de registro utilizadas para efectos de control interno de pasivos y patrimonio, información gerencial o control de futuras situaciones financieras, así como para conciliar las diferencias entre los registros contables de los pasivos y patrimonio y las declaraciones tributarias.',
                'ajuste' => 'MENSUAL',
                'naturaleza' => 'CREDITO',
                'tipo' => 'LOCAL',
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
