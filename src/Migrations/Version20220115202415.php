<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220115202415 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE accion CHANGE empresa_id empresa_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE almacen CHANGE orden orden INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cliente CHANGE rut rut VARCHAR(12) DEFAULT NULL, CHANGE telefono telefono VARCHAR(100) DEFAULT NULL, CHANGE correo correo VARCHAR(255) DEFAULT NULL, CHANGE celular celular VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE cliente_proveedor CHANGE contacto contacto VARCHAR(100) DEFAULT NULL, CHANGE telefono telefono VARCHAR(100) DEFAULT NULL, CHANGE correo correo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE configuracion CHANGE host host VARCHAR(255) DEFAULT NULL, CHANGE lotes lotes INT DEFAULT NULL, CHANGE valor_multa valor_multa INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cuenta CHANGE fecha_ultimamodificacion fecha_ultimamodificacion DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE empresa CHANGE rol rol VARCHAR(255) DEFAULT NULL, CHANGE logo logo VARCHAR(255) DEFAULT NULL, CHANGE fecha_ultimamodificacion fecha_ultimamodificacion DATETIME DEFAULT NULL, CHANGE logo_alt logo_alt VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE folio ADD pedido INT DEFAULT NULL, CHANGE empresa_id empresa_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE importacion CHANGE cuenta_id cuenta_id INT DEFAULT NULL, CHANGE usuario_carga_id usuario_carga_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menu CHANGE depende_de_id depende_de_id INT DEFAULT NULL, CHANGE menu_cabezera_id menu_cabezera_id INT DEFAULT NULL, CHANGE modulo_id modulo_id INT DEFAULT NULL, CHANGE icono icono VARCHAR(255) DEFAULT NULL, CHANGE orden orden INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menu_cabezera CHANGE empresa_id empresa_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE modulo CHANGE nombre_alt nombre_alt VARCHAR(255) DEFAULT NULL, CHANGE descripcion descripcion VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE movimiento CHANGE valor_total valor_total DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE pais CHANGE empresa_id empresa_id INT DEFAULT NULL, CHANGE orden orden INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pedido CHANGE cliente_id cliente_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE privilegio CHANGE modulo_per_id modulo_per_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE privilegio_tipousuario CHANGE modulo_per_id modulo_per_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE producto CHANGE receta_id receta_id INT DEFAULT NULL, CHANGE peso_lata peso_lata INT DEFAULT NULL');
        $this->addSql('ALTER TABLE producto_tipo CHANGE orden orden INT DEFAULT NULL');
        $this->addSql('ALTER TABLE producto_unidad CHANGE orden orden INT DEFAULT NULL');
        $this->addSql('ALTER TABLE receta CHANGE rendimiento rendimiento DOUBLE PRECISION DEFAULT NULL, CHANGE total total DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE receta_detalle CHANGE cantidad cantidad DOUBLE PRECISION DEFAULT NULL, CHANGE cant_unidad cant_unidad DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE reset_password_request CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sucursal CHANGE cuenta_id cuenta_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE usuario CHANGE categoria_id categoria_id INT DEFAULT NULL, CHANGE status_id status_id INT DEFAULT NULL, CHANGE tipo_documento_id tipo_documento_id INT DEFAULT NULL, CHANGE empresa_actual empresa_actual INT DEFAULT NULL, CHANGE fecha_no_disponible fecha_no_disponible DATETIME DEFAULT NULL, CHANGE whatsapp whatsapp VARCHAR(255) DEFAULT NULL, CHANGE telefono telefono VARCHAR(255) DEFAULT NULL, CHANGE rut rut VARCHAR(255) DEFAULT NULL, CHANGE direccion direccion VARCHAR(255) DEFAULT NULL, CHANGE sexo sexo VARCHAR(255) DEFAULT NULL, CHANGE color color VARCHAR(255) DEFAULT NULL, CHANGE password_ant password_ant VARCHAR(255) DEFAULT NULL, CHANGE lunes lunes TINYINT(1) DEFAULT NULL, CHANGE lunes_start lunes_start TIME DEFAULT NULL, CHANGE lunes_end lunes_end TIME DEFAULT NULL, CHANGE martes martes TINYINT(1) DEFAULT NULL, CHANGE martes_start martes_start TIME DEFAULT NULL, CHANGE martes_end martes_end TIME DEFAULT NULL, CHANGE miercoles miercoles TINYINT(1) DEFAULT NULL, CHANGE miercoles_start miercoles_start TIME DEFAULT NULL, CHANGE miercoles_end miercoles_end TIME DEFAULT NULL, CHANGE jueves jueves TINYINT(1) DEFAULT NULL, CHANGE jueves_start jueves_start TIME DEFAULT NULL, CHANGE jueves_end jueves_end TIME DEFAULT NULL, CHANGE viernes viernes TINYINT(1) DEFAULT NULL, CHANGE viernes_start viernes_start TIME DEFAULT NULL, CHANGE viernes_end viernes_end TIME DEFAULT NULL, CHANGE sabado sabado TINYINT(1) DEFAULT NULL, CHANGE sabado_start sabado_start TIME DEFAULT NULL, CHANGE sabado_end sabado_end TIME DEFAULT NULL, CHANGE domingo domingo TINYINT(1) DEFAULT NULL, CHANGE domingo_start domingo_start TIME DEFAULT NULL, CHANGE domingo_end domingo_end TIME DEFAULT NULL, CHANGE sobrecupo sobrecupo INT DEFAULT NULL, CHANGE lotes lotes JSON DEFAULT NULL');
        $this->addSql('ALTER TABLE usuario_cuenta CHANGE cuenta_id cuenta_id INT DEFAULT NULL, CHANGE usuario_id usuario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE usuario_no_disponible CHANGE usuario_id usuario_id INT DEFAULT NULL, CHANGE fecha_inicio fecha_inicio DATE DEFAULT NULL, CHANGE fecha_fin fecha_fin DATE DEFAULT NULL, CHANGE anio anio INT DEFAULT NULL, CHANGE mes mes INT DEFAULT NULL, CHANGE dia dia INT DEFAULT NULL');
        $this->addSql('ALTER TABLE usuario_tipo CHANGE menu_cabezera_id menu_cabezera_id INT DEFAULT NULL, CHANGE empresa_id empresa_id INT DEFAULT NULL, CHANGE orden orden INT DEFAULT NULL, CHANGE statues statues LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE usuario_usuariocategoria CHANGE cuenta_id cuenta_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE webhook CHANGE verify_token verify_token VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE accion CHANGE empresa_id empresa_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE almacen CHANGE orden orden INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cliente CHANGE rut rut VARCHAR(12) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE telefono telefono VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE correo correo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE celular celular VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE cliente_proveedor CHANGE contacto contacto VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE telefono telefono VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE correo correo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE configuracion CHANGE host host VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE lotes lotes INT DEFAULT NULL, CHANGE valor_multa valor_multa INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cuenta CHANGE fecha_ultimamodificacion fecha_ultimamodificacion DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE empresa CHANGE rol rol VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE logo logo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE fecha_ultimamodificacion fecha_ultimamodificacion DATETIME DEFAULT \'NULL\', CHANGE logo_alt logo_alt VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE folio DROP pedido, CHANGE empresa_id empresa_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE importacion CHANGE cuenta_id cuenta_id INT DEFAULT NULL, CHANGE usuario_carga_id usuario_carga_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menu CHANGE depende_de_id depende_de_id INT DEFAULT NULL, CHANGE menu_cabezera_id menu_cabezera_id INT DEFAULT NULL, CHANGE modulo_id modulo_id INT DEFAULT NULL, CHANGE icono icono VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE orden orden INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menu_cabezera CHANGE empresa_id empresa_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE modulo CHANGE nombre_alt nombre_alt VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE descripcion descripcion VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE movimiento CHANGE valor_total valor_total DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE pais CHANGE empresa_id empresa_id INT DEFAULT NULL, CHANGE orden orden INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pedido CHANGE cliente_id cliente_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE privilegio CHANGE modulo_per_id modulo_per_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE privilegio_tipousuario CHANGE modulo_per_id modulo_per_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE producto CHANGE receta_id receta_id INT DEFAULT NULL, CHANGE peso_lata peso_lata INT DEFAULT NULL');
        $this->addSql('ALTER TABLE producto_tipo CHANGE orden orden INT DEFAULT NULL');
        $this->addSql('ALTER TABLE producto_unidad CHANGE orden orden INT DEFAULT NULL');
        $this->addSql('ALTER TABLE receta CHANGE rendimiento rendimiento DOUBLE PRECISION DEFAULT \'NULL\', CHANGE total total DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE receta_detalle CHANGE cantidad cantidad DOUBLE PRECISION DEFAULT \'NULL\', CHANGE cant_unidad cant_unidad DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE reset_password_request CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sucursal CHANGE cuenta_id cuenta_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE usuario CHANGE categoria_id categoria_id INT DEFAULT NULL, CHANGE status_id status_id INT DEFAULT NULL, CHANGE tipo_documento_id tipo_documento_id INT DEFAULT NULL, CHANGE empresa_actual empresa_actual INT DEFAULT NULL, CHANGE fecha_no_disponible fecha_no_disponible DATETIME DEFAULT \'NULL\', CHANGE whatsapp whatsapp VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE telefono telefono VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE rut rut VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE direccion direccion VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE sexo sexo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE color color VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE password_ant password_ant VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE lunes lunes TINYINT(1) DEFAULT \'NULL\', CHANGE lunes_start lunes_start TIME DEFAULT \'NULL\', CHANGE lunes_end lunes_end TIME DEFAULT \'NULL\', CHANGE martes martes TINYINT(1) DEFAULT \'NULL\', CHANGE martes_start martes_start TIME DEFAULT \'NULL\', CHANGE martes_end martes_end TIME DEFAULT \'NULL\', CHANGE miercoles miercoles TINYINT(1) DEFAULT \'NULL\', CHANGE miercoles_start miercoles_start TIME DEFAULT \'NULL\', CHANGE miercoles_end miercoles_end TIME DEFAULT \'NULL\', CHANGE jueves jueves TINYINT(1) DEFAULT \'NULL\', CHANGE jueves_start jueves_start TIME DEFAULT \'NULL\', CHANGE jueves_end jueves_end TIME DEFAULT \'NULL\', CHANGE viernes viernes TINYINT(1) DEFAULT \'NULL\', CHANGE viernes_start viernes_start TIME DEFAULT \'NULL\', CHANGE viernes_end viernes_end TIME DEFAULT \'NULL\', CHANGE sabado sabado TINYINT(1) DEFAULT \'NULL\', CHANGE sabado_start sabado_start TIME DEFAULT \'NULL\', CHANGE sabado_end sabado_end TIME DEFAULT \'NULL\', CHANGE domingo domingo TINYINT(1) DEFAULT \'NULL\', CHANGE domingo_start domingo_start TIME DEFAULT \'NULL\', CHANGE domingo_end domingo_end TIME DEFAULT \'NULL\', CHANGE sobrecupo sobrecupo INT DEFAULT NULL, CHANGE lotes lotes LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_bin`');
        $this->addSql('ALTER TABLE usuario_cuenta CHANGE cuenta_id cuenta_id INT DEFAULT NULL, CHANGE usuario_id usuario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE usuario_no_disponible CHANGE usuario_id usuario_id INT DEFAULT NULL, CHANGE fecha_inicio fecha_inicio DATE DEFAULT \'NULL\', CHANGE fecha_fin fecha_fin DATE DEFAULT \'NULL\', CHANGE anio anio INT DEFAULT NULL, CHANGE mes mes INT DEFAULT NULL, CHANGE dia dia INT DEFAULT NULL');
        $this->addSql('ALTER TABLE usuario_tipo CHANGE menu_cabezera_id menu_cabezera_id INT DEFAULT NULL, CHANGE empresa_id empresa_id INT DEFAULT NULL, CHANGE orden orden INT DEFAULT NULL, CHANGE statues statues LONGTEXT CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE usuario_usuariocategoria CHANGE cuenta_id cuenta_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE webhook CHANGE verify_token verify_token VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
