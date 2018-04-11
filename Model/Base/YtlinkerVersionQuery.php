<?php

namespace YTLinker\Model\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use YTLinker\Model\YtlinkerVersion as ChildYtlinkerVersion;
use YTLinker\Model\YtlinkerVersionQuery as ChildYtlinkerVersionQuery;
use YTLinker\Model\Map\YtlinkerVersionTableMap;

/**
 * Base class that represents a query for the 'ytlinker_version' table.
 *
 *
 *
 * @method     ChildYtlinkerVersionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildYtlinkerVersionQuery orderByPosition($order = Criteria::ASC) Order by the position column
 * @method     ChildYtlinkerVersionQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildYtlinkerVersionQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ChildYtlinkerVersionQuery orderByVersion($order = Criteria::ASC) Order by the version column
 * @method     ChildYtlinkerVersionQuery orderByVersionCreatedAt($order = Criteria::ASC) Order by the version_created_at column
 * @method     ChildYtlinkerVersionQuery orderByVersionCreatedBy($order = Criteria::ASC) Order by the version_created_by column
 *
 * @method     ChildYtlinkerVersionQuery groupById() Group by the id column
 * @method     ChildYtlinkerVersionQuery groupByPosition() Group by the position column
 * @method     ChildYtlinkerVersionQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildYtlinkerVersionQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ChildYtlinkerVersionQuery groupByVersion() Group by the version column
 * @method     ChildYtlinkerVersionQuery groupByVersionCreatedAt() Group by the version_created_at column
 * @method     ChildYtlinkerVersionQuery groupByVersionCreatedBy() Group by the version_created_by column
 *
 * @method     ChildYtlinkerVersionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildYtlinkerVersionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildYtlinkerVersionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildYtlinkerVersionQuery leftJoinYtlinker($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ytlinker relation
 * @method     ChildYtlinkerVersionQuery rightJoinYtlinker($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ytlinker relation
 * @method     ChildYtlinkerVersionQuery innerJoinYtlinker($relationAlias = null) Adds a INNER JOIN clause to the query using the Ytlinker relation
 *
 * @method     ChildYtlinkerVersion findOne(ConnectionInterface $con = null) Return the first ChildYtlinkerVersion matching the query
 * @method     ChildYtlinkerVersion findOneOrCreate(ConnectionInterface $con = null) Return the first ChildYtlinkerVersion matching the query, or a new ChildYtlinkerVersion object populated from the query conditions when no match is found
 *
 * @method     ChildYtlinkerVersion findOneById(int $id) Return the first ChildYtlinkerVersion filtered by the id column
 * @method     ChildYtlinkerVersion findOneByPosition(int $position) Return the first ChildYtlinkerVersion filtered by the position column
 * @method     ChildYtlinkerVersion findOneByCreatedAt(string $created_at) Return the first ChildYtlinkerVersion filtered by the created_at column
 * @method     ChildYtlinkerVersion findOneByUpdatedAt(string $updated_at) Return the first ChildYtlinkerVersion filtered by the updated_at column
 * @method     ChildYtlinkerVersion findOneByVersion(int $version) Return the first ChildYtlinkerVersion filtered by the version column
 * @method     ChildYtlinkerVersion findOneByVersionCreatedAt(string $version_created_at) Return the first ChildYtlinkerVersion filtered by the version_created_at column
 * @method     ChildYtlinkerVersion findOneByVersionCreatedBy(string $version_created_by) Return the first ChildYtlinkerVersion filtered by the version_created_by column
 *
 * @method     array findById(int $id) Return ChildYtlinkerVersion objects filtered by the id column
 * @method     array findByPosition(int $position) Return ChildYtlinkerVersion objects filtered by the position column
 * @method     array findByCreatedAt(string $created_at) Return ChildYtlinkerVersion objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return ChildYtlinkerVersion objects filtered by the updated_at column
 * @method     array findByVersion(int $version) Return ChildYtlinkerVersion objects filtered by the version column
 * @method     array findByVersionCreatedAt(string $version_created_at) Return ChildYtlinkerVersion objects filtered by the version_created_at column
 * @method     array findByVersionCreatedBy(string $version_created_by) Return ChildYtlinkerVersion objects filtered by the version_created_by column
 *
 */
abstract class YtlinkerVersionQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \YTLinker\Model\Base\YtlinkerVersionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\YTLinker\\Model\\YtlinkerVersion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildYtlinkerVersionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildYtlinkerVersionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \YTLinker\Model\YtlinkerVersionQuery) {
            return $criteria;
        }
        $query = new \YTLinker\Model\YtlinkerVersionQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$id, $version] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildYtlinkerVersion|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = YtlinkerVersionTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(YtlinkerVersionTableMap::DATABASE_NAME);
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
     * @param     ConnectionInterface $con A connection object
     *
     * @return   ChildYtlinkerVersion A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, POSITION, CREATED_AT, UPDATED_AT, VERSION, VERSION_CREATED_AT, VERSION_CREATED_BY FROM ytlinker_version WHERE ID = :p0 AND VERSION = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            $obj = new ChildYtlinkerVersion();
            $obj->hydrate($row);
            YtlinkerVersionTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildYtlinkerVersion|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return ChildYtlinkerVersionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(YtlinkerVersionTableMap::ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(YtlinkerVersionTableMap::VERSION, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildYtlinkerVersionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(YtlinkerVersionTableMap::ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(YtlinkerVersionTableMap::VERSION, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @see       filterByYtlinker()
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildYtlinkerVersionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(YtlinkerVersionTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(YtlinkerVersionTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(YtlinkerVersionTableMap::ID, $id, $comparison);
    }

    /**
     * Filter the query on the position column
     *
     * Example usage:
     * <code>
     * $query->filterByPosition(1234); // WHERE position = 1234
     * $query->filterByPosition(array(12, 34)); // WHERE position IN (12, 34)
     * $query->filterByPosition(array('min' => 12)); // WHERE position > 12
     * </code>
     *
     * @param     mixed $position The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildYtlinkerVersionQuery The current query, for fluid interface
     */
    public function filterByPosition($position = null, $comparison = null)
    {
        if (is_array($position)) {
            $useMinMax = false;
            if (isset($position['min'])) {
                $this->addUsingAlias(YtlinkerVersionTableMap::POSITION, $position['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($position['max'])) {
                $this->addUsingAlias(YtlinkerVersionTableMap::POSITION, $position['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(YtlinkerVersionTableMap::POSITION, $position, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildYtlinkerVersionQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(YtlinkerVersionTableMap::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(YtlinkerVersionTableMap::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(YtlinkerVersionTableMap::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildYtlinkerVersionQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(YtlinkerVersionTableMap::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(YtlinkerVersionTableMap::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(YtlinkerVersionTableMap::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query on the version column
     *
     * Example usage:
     * <code>
     * $query->filterByVersion(1234); // WHERE version = 1234
     * $query->filterByVersion(array(12, 34)); // WHERE version IN (12, 34)
     * $query->filterByVersion(array('min' => 12)); // WHERE version > 12
     * </code>
     *
     * @param     mixed $version The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildYtlinkerVersionQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(YtlinkerVersionTableMap::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(YtlinkerVersionTableMap::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(YtlinkerVersionTableMap::VERSION, $version, $comparison);
    }

    /**
     * Filter the query on the version_created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByVersionCreatedAt('2011-03-14'); // WHERE version_created_at = '2011-03-14'
     * $query->filterByVersionCreatedAt('now'); // WHERE version_created_at = '2011-03-14'
     * $query->filterByVersionCreatedAt(array('max' => 'yesterday')); // WHERE version_created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $versionCreatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildYtlinkerVersionQuery The current query, for fluid interface
     */
    public function filterByVersionCreatedAt($versionCreatedAt = null, $comparison = null)
    {
        if (is_array($versionCreatedAt)) {
            $useMinMax = false;
            if (isset($versionCreatedAt['min'])) {
                $this->addUsingAlias(YtlinkerVersionTableMap::VERSION_CREATED_AT, $versionCreatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($versionCreatedAt['max'])) {
                $this->addUsingAlias(YtlinkerVersionTableMap::VERSION_CREATED_AT, $versionCreatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(YtlinkerVersionTableMap::VERSION_CREATED_AT, $versionCreatedAt, $comparison);
    }

    /**
     * Filter the query on the version_created_by column
     *
     * Example usage:
     * <code>
     * $query->filterByVersionCreatedBy('fooValue');   // WHERE version_created_by = 'fooValue'
     * $query->filterByVersionCreatedBy('%fooValue%'); // WHERE version_created_by LIKE '%fooValue%'
     * </code>
     *
     * @param     string $versionCreatedBy The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildYtlinkerVersionQuery The current query, for fluid interface
     */
    public function filterByVersionCreatedBy($versionCreatedBy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($versionCreatedBy)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $versionCreatedBy)) {
                $versionCreatedBy = str_replace('*', '%', $versionCreatedBy);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(YtlinkerVersionTableMap::VERSION_CREATED_BY, $versionCreatedBy, $comparison);
    }

    /**
     * Filter the query by a related \YTLinker\Model\Ytlinker object
     *
     * @param \YTLinker\Model\Ytlinker|ObjectCollection $ytlinker The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildYtlinkerVersionQuery The current query, for fluid interface
     */
    public function filterByYtlinker($ytlinker, $comparison = null)
    {
        if ($ytlinker instanceof \YTLinker\Model\Ytlinker) {
            return $this
                ->addUsingAlias(YtlinkerVersionTableMap::ID, $ytlinker->getId(), $comparison);
        } elseif ($ytlinker instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(YtlinkerVersionTableMap::ID, $ytlinker->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByYtlinker() only accepts arguments of type \YTLinker\Model\Ytlinker or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Ytlinker relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildYtlinkerVersionQuery The current query, for fluid interface
     */
    public function joinYtlinker($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Ytlinker');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Ytlinker');
        }

        return $this;
    }

    /**
     * Use the Ytlinker relation Ytlinker object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \YTLinker\Model\YtlinkerQuery A secondary query class using the current class as primary query
     */
    public function useYtlinkerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinYtlinker($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ytlinker', '\YTLinker\Model\YtlinkerQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildYtlinkerVersion $ytlinkerVersion Object to remove from the list of results
     *
     * @return ChildYtlinkerVersionQuery The current query, for fluid interface
     */
    public function prune($ytlinkerVersion = null)
    {
        if ($ytlinkerVersion) {
            $this->addCond('pruneCond0', $this->getAliasedColName(YtlinkerVersionTableMap::ID), $ytlinkerVersion->getId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(YtlinkerVersionTableMap::VERSION), $ytlinkerVersion->getVersion(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ytlinker_version table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(YtlinkerVersionTableMap::DATABASE_NAME);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            YtlinkerVersionTableMap::clearInstancePool();
            YtlinkerVersionTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildYtlinkerVersion or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildYtlinkerVersion object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public function delete(ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(YtlinkerVersionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(YtlinkerVersionTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        YtlinkerVersionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            YtlinkerVersionTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

} // YtlinkerVersionQuery
