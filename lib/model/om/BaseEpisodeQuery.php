<?php


/**
 * Base class that represents a query for the 'episode' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.4 on:
 *
 * Fri Jun 28 20:37:01 2013
 *
 * @method     EpisodeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     EpisodeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     EpisodeQuery orderByNumber($order = Criteria::ASC) Order by the number column
 * @method     EpisodeQuery orderBySeason($order = Criteria::ASC) Order by the season column
 * @method     EpisodeQuery orderByYear($order = Criteria::ASC) Order by the year column
 *
 * @method     EpisodeQuery groupById() Group by the id column
 * @method     EpisodeQuery groupByName() Group by the name column
 * @method     EpisodeQuery groupByNumber() Group by the number column
 * @method     EpisodeQuery groupBySeason() Group by the season column
 * @method     EpisodeQuery groupByYear() Group by the year column
 *
 * @method     EpisodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     EpisodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     EpisodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Episode findOne(PropelPDO $con = null) Return the first Episode matching the query
 * @method     Episode findOneOrCreate(PropelPDO $con = null) Return the first Episode matching the query, or a new Episode object populated from the query conditions when no match is found
 *
 * @method     Episode findOneById(int $id) Return the first Episode filtered by the id column
 * @method     Episode findOneByName(string $name) Return the first Episode filtered by the name column
 * @method     Episode findOneByNumber(int $number) Return the first Episode filtered by the number column
 * @method     Episode findOneBySeason(int $season) Return the first Episode filtered by the season column
 * @method     Episode findOneByYear(int $year) Return the first Episode filtered by the year column
 *
 * @method     array findById(int $id) Return Episode objects filtered by the id column
 * @method     array findByName(string $name) Return Episode objects filtered by the name column
 * @method     array findByNumber(int $number) Return Episode objects filtered by the number column
 * @method     array findBySeason(int $season) Return Episode objects filtered by the season column
 * @method     array findByYear(int $year) Return Episode objects filtered by the year column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseEpisodeQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseEpisodeQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Episode', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new EpisodeQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    EpisodeQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof EpisodeQuery) {
			return $criteria;
		}
		$query = new EpisodeQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key.
	 * Propel uses the instance pool to skip the database if the object exists.
	 * Go fast if the query is untouched.
	 *
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Episode|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = EpisodePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(EpisodePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		if ($this->formatter || $this->modelAlias || $this->with || $this->select
		 || $this->selectColumns || $this->asColumns || $this->selectModifiers
		 || $this->map || $this->having || $this->joins) {
			return $this->findPkComplex($key, $con);
		} else {
			return $this->findPkSimple($key, $con);
		}
	}

	/**
	 * Find object by primary key using raw SQL to go fast.
	 * Bypass doSelect() and the object formatter by using generated code.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    Episode A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `NAME`, `NUMBER`, `SEASON`, `YEAR` FROM `episode` WHERE `ID` = :p0';
		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key, PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new Episode();
			$obj->hydrate($row);
			EpisodePeer::addInstanceToPool($obj, (string) $row[0]);
		}
		$stmt->closeCursor();

		return $obj;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    Episode|array|mixed the result, formatted by the current formatter
	 */
	protected function findPkComplex($key, $con)
	{
		// As the query uses a PK condition, no limit(1) is necessary.
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKey($key)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKeys($keys)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->format($stmt);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    EpisodeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(EpisodePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    EpisodeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(EpisodePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById(1234); // WHERE id = 1234
	 * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
	 * $query->filterById(array('min' => 12)); // WHERE id > 12
	 * </code>
	 *
	 * @param     mixed $id The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EpisodeQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(EpisodePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
	 * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $name The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EpisodeQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EpisodePeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the number column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNumber(1234); // WHERE number = 1234
	 * $query->filterByNumber(array(12, 34)); // WHERE number IN (12, 34)
	 * $query->filterByNumber(array('min' => 12)); // WHERE number > 12
	 * </code>
	 *
	 * @param     mixed $number The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EpisodeQuery The current query, for fluid interface
	 */
	public function filterByNumber($number = null, $comparison = null)
	{
		if (is_array($number)) {
			$useMinMax = false;
			if (isset($number['min'])) {
				$this->addUsingAlias(EpisodePeer::NUMBER, $number['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($number['max'])) {
				$this->addUsingAlias(EpisodePeer::NUMBER, $number['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EpisodePeer::NUMBER, $number, $comparison);
	}

	/**
	 * Filter the query on the season column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySeason(1234); // WHERE season = 1234
	 * $query->filterBySeason(array(12, 34)); // WHERE season IN (12, 34)
	 * $query->filterBySeason(array('min' => 12)); // WHERE season > 12
	 * </code>
	 *
	 * @param     mixed $season The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EpisodeQuery The current query, for fluid interface
	 */
	public function filterBySeason($season = null, $comparison = null)
	{
		if (is_array($season)) {
			$useMinMax = false;
			if (isset($season['min'])) {
				$this->addUsingAlias(EpisodePeer::SEASON, $season['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($season['max'])) {
				$this->addUsingAlias(EpisodePeer::SEASON, $season['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EpisodePeer::SEASON, $season, $comparison);
	}

	/**
	 * Filter the query on the year column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByYear(1234); // WHERE year = 1234
	 * $query->filterByYear(array(12, 34)); // WHERE year IN (12, 34)
	 * $query->filterByYear(array('min' => 12)); // WHERE year > 12
	 * </code>
	 *
	 * @param     mixed $year The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EpisodeQuery The current query, for fluid interface
	 */
	public function filterByYear($year = null, $comparison = null)
	{
		if (is_array($year)) {
			$useMinMax = false;
			if (isset($year['min'])) {
				$this->addUsingAlias(EpisodePeer::YEAR, $year['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($year['max'])) {
				$this->addUsingAlias(EpisodePeer::YEAR, $year['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EpisodePeer::YEAR, $year, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Episode $episode Object to remove from the list of results
	 *
	 * @return    EpisodeQuery The current query, for fluid interface
	 */
	public function prune($episode = null)
	{
		if ($episode) {
			$this->addUsingAlias(EpisodePeer::ID, $episode->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseEpisodeQuery