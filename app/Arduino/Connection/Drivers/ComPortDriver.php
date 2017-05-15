<?php
namespace App\Arduino\Connection\Drivers;

use App\Arduino\Connection\Contracts\DriverInterface;

class ComPortDriver implements DriverInterface
{
	private $serial;

	private $connected = false;

    private $dsn;

    private $options = [];

    /**
	 * 
	 * @param SerialPort $serial
	 * @param string     $dsn 		@example "device=/dev/ttyACM0;baudRate=115200;parity=300"
	 * @param array      $options
	 */
	public function __construct(SerialPort $serial, string $dsn, array $options = [])
	{
		$this->serial = $serial;
		$this->dsn = $dsn;
		$this->options = $options;
	}

	/**
	 * Send message to the controller.
	 * 
	 * @param  mixed $payload 
	 * @return mixed          
	 */
	public function send($payload)
	{
		return $this->getSerial()->sendMessage(...func_get_args());
	}

    /**
     * @return mixed
     */
	public function read()
	{
        return $this->getSerial()->readPort(...func_get_args());
	}

	/**
	 * Get connected serial instance.
	 * 
	 * @return SerialPort 
	 */
	private function getSerial()
	{
		if (! $this->connected) {

		    $this->connect();
			$this->connected = true;
		}

		return $this->serial;
	}

    /**
     * Connect to the serial port
     */
	private function connect()
    {
        $parser = new DsnParser($this->dsn, $this->configSeparator, $this->valueSeparator);

        foreach ($parser->getValues() as $name => $value) {
            if (! method_exists($this->serial->getPlatform(), $method = 'set' . studly_case($name))) {
                throw new \InvalidArgumentException(sprintf(
                    'Undefined dsn option %s for the serial port driver', $name
                ));

            }

            $this->serial->getPlatform()->$method($value);
        }
    }

    /**
     * @param $payload
     * @param callable $callback
     * @return mixed
     */
    public function wait($payload, callable $callback)
    {
        $this->send($payload);

        return $callback($this->read());
    }
}