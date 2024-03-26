class BarangControllerIntegrationTest extends TestCase {
    public function testInsertData() {
        // Simulate HTTP request to controller
        $_POST['nama_barang'] = 'Test Barang';
        $_POST['stok'] = 10;
        
        // Dispatch request to controller method
        $controller = new BarangController();
        $response = $controller->addBarang();
        
        // Retrieve data from database for assertion
        $db = new Database();
        $result = $db->query('SELECT * FROM barang WHERE nama_barang = ?', $_POST['nama_barang']);
        
        // Assert that data is inserted into the database
        $this->assertEquals(1, count($result));
    }
}