<?php namespace Brightpearl;

use Guzzle\Service\Command\ResponseClassInterface;
use Guzzle\Service\Command\OperationCommand;

/**
 * ResponseSearchModel
 *
 * @package default
 * @author James Pudney
 */
class ResponseSearchModel extends ResponseClassInterface
{
    /**
     * Search Results
     *
     * @var array
     */
    protected $results;
    
    /**
     * Columns
     *
     * @var array
     */
    protected $columns;
    
    /**
     * FromCommand
     *
     * @return ResponseSearchModel
     * @author James Pudney
     */
    public static function fromCommand(OperationCommand $command)
    {
        $response = $command->getResponse();
        $json = $response->json();
        
        $columns = self::getColumnNames($json['response']['metaData']['columns']);
        $results = $json['response']['results'];
        
        // reformat the results
        $results = self::formatSearchResults($results, $columns);
        
        // return the model
        return new self($results, $columns);
    }
    
    /**
     * Constructor
     *
     * @author James Pudney
     */
    public function __construct($results, $columns = array(), $metaData = array())
    {
        $this->results = $results;
        $this->columns = $columns;
    }
    
    /**
     * FormatSearchResults
     *
     * @return void
     * @author James Pudney
     */
    protected static function formatSearchResults($results, $columns)
    {
		foreach ($results as $result) {
			foreach ($columns as $col_key => $col_value) {
				$result[$col_value] = $result[$col_key];
				unset($result[$col_key]);
			}
		}

		return $results;
    }
    
    /**
     * Get Columns Names
     *
     * @return array
     * @author James Pudney
     */
    protected static function getColumnNames($columns)
    {
        $columnNames = array();
        
        foreach ($columns as $column) {
            $columnNames[] = $column['name'];
        }
        
        return $columnNames;
    }
} // END class ResponseSearchModel extends ResponseClassInterface