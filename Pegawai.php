<?php
class Pegawai
{
  protected $nip;
  public $nama;
  private $agama, $jabatan, $status;
  static $jmlh;
  const PT = 'PT. HTP Indonesia';

  public function __construct($nip, $nama, $jabatan, $agama, $status)
  {
    $this->nip = $nip;
    $this->nama = $nama;
    $this->jabatan = $jabatan;
    $this->agama = $agama;
    $this->status = $status;
    self::$jmlh++;
  }
  public function getSalary()
  {
    switch ($this->jabatan) {
      case 'Manager':
        $salary = 15000000;
        break;
      case 'Aisten Manager':
        $salary = 10000000;
        break;
      case 'Kepala Bagian':
        $salary = 7000000;
        break;
      case 'Staff':
        $salary = 5000000;
        break;

      default:
        $salary = 0;
        break;
    }
    return $salary;
  }
  public function getPositionAllowance($salary)
  {
    return (0.2 * $salary);
  }
  public function getFamilyAllowance($salary)
  {
    return strtolower($this->status) == "menikah" ? (0.1 * $salary) : 0;
  }
  public function getTempSalary($salary, $familiy_allowance, $position_allowance)
  {
    return $salary + $familiy_allowance + $position_allowance;
  }
  public function getZakat($temp_salary)
  {
    return strtolower($this->agama) == "islam" && $temp_salary >= 6000000 ? $temp_salary * 0.025 : 0;
  }
  public function getTotalSalary($temp_salary, $zakat)
  {
    return $temp_salary - $zakat;
  }

  public function getCurrency($value)
  {
    return number_format($value, 0, ',', '.');
  }
  public function printData($salary, $familiy_allowance, $position_allowance, $zakat, $total)
  {
    echo "
    <div class='card'>
      <table cellpadding=''>
        <tr>
          <td>NIP</td>
          <td>" . $this->nip . "</td>
        </tr>
        <tr>
          <td>Nama Pegawai</td>
          <td>" . $this->nama . "</td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td>" . $this->jabatan . "</td>
        </tr>
        <tr>
          <td>Agama</td>
          <td>" . $this->agama . "</td>
        </tr>
        <tr>
          <td>Status</td>
          <td>" . $this->status . "</td>
        </tr>
        <tr>
          <td>Gaji Pokok</td>
          <td>" . $salary . "</td>
        </tr>
        <tr>
          <td>Tunjangan Jabatan</td>
          <td>" . $position_allowance . "</td>
        </tr>
        <tr>
          <td>Tunjangan Keluarga</td>
          <td>" . $familiy_allowance . "</td>
        </tr>
        <tr>
          <td>Zakat</td>
          <td>" . $zakat . "</td>
        </tr>
        <tr>
          <td>Total Gaji</td>
          <td>" . $total . "</td>
        </tr>
      </table>
    </div>
    ";
  }
}
