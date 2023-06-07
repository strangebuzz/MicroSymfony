<?php

// castor version: v0.3.0
namespace Castor\Attribute;

#[\Attribute(\Attribute::TARGET_PARAMETER)]
class AsArgument extends AsCommandArgument
{
    public function __construct(string|null $name = null, public readonly string $description = '', public readonly array $suggestedValues = [])
    {
    }
}
namespace Castor\Attribute;

abstract class AsCommandArgument
{
    public function __construct(public readonly string|null $name = null)
    {
    }
}
namespace Castor\Attribute;

#[\Attribute(\Attribute::TARGET_FUNCTION)]
class AsContext
{
    public function __construct(public string $name = '', public bool $default = false)
    {
    }
}
namespace Castor\Attribute;

#[\Attribute(\Attribute::TARGET_PARAMETER)]
class AsOption extends AsCommandArgument
{
    public function __construct(string|null $name = null, public readonly string|array|null $shortcut = null, public readonly int|null $mode = null, public readonly string $description = '', public readonly array $suggestedValues = [])
    {
    }
}
namespace Castor\Attribute;

#[\Attribute(\Attribute::TARGET_FUNCTION)]
class AsTask
{
    public function __construct(public string $name = '', public string|null $namespace = null, public string $description = '', public array $aliases = [])
    {
    }
}
namespace Castor\Console;

class Application extends \Symfony\Component\Console\Application
{
    public final const VERSION = 'v0.3.0';
    public function __construct(private readonly string $rootDir, private readonly \Castor\ContextRegistry $contextRegistry = new \Castor\ContextRegistry(), private readonly \Castor\Stub\StubsGenerator $stubsGenerator = new \Castor\Stub\StubsGenerator(), private readonly \Castor\FunctionFinder $functionFinder = new \Castor\FunctionFinder())
    {
    }
    public function doRun(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output) : int
    {
    }
    protected function doRunCommand(\Symfony\Component\Console\Command\Command $command, \Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output) : int
    {
    }
    private function initializeApplication() : void
    {
    }
    private function initializeContext(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output) : void
    {
    }
    private function createContext(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output) : \Castor\Context
    {
    }
}
namespace Castor\Console;

class ApplicationFactory
{
    public static function run() : void
    {
    }
    public static function create(\Psr\Log\LoggerInterface $logger) : Application|\Symfony\Component\Console\SingleCommandApplication
    {
    }
}
namespace Castor\Console\Command;

class CastorFileNotFoundCommand extends \Symfony\Component\Console\SingleCommandApplication
{
    public function __construct(private readonly \RuntimeException $e)
    {
    }
    protected function configure() : void
    {
    }
    protected function execute(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output) : int
    {
    }
}
namespace Castor\Console\Command;

class TaskCommand extends \Symfony\Component\Console\Command\Command
{
    private const SUPPORTED_PARAMETER_TYPES = [\Castor\Context::class, \Symfony\Component\Console\Style\SymfonyStyle::class, \Symfony\Component\Console\Application::class, \Symfony\Component\Console\Command\Command::class, \Symfony\Component\Console\Input\InputInterface::class, \Symfony\Component\Console\Output\OutputInterface::class];
    private array $argumentsMap = [];
    public function __construct(\Castor\Attribute\AsTask $taskAttribute, private readonly \ReflectionFunction $function)
    {
    }
    protected function configure() : void
    {
    }
    protected function execute(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output) : int
    {
    }
    private function setParameterName(\ReflectionParameter $parameter, ?string $name) : string
    {
    }
    private function getParameterName(\ReflectionParameter $parameter) : string
    {
    }
}
namespace Castor;

class Context implements \ArrayAccess
{
    public readonly string $currentDirectory;
    public function __construct(public readonly array $data = [], public readonly array $environment = [], string $currentDirectory = null, public readonly bool $tty = false, public readonly bool $pty = true, public readonly float|null $timeout = 60, public readonly bool $quiet = false, public readonly bool $allowFailure = false, public readonly bool $notify = false, public readonly VerbosityLevel $verbosityLevel = VerbosityLevel::NOT_CONFIGURED)
    {
    }
    public function withData(array $data, bool $keepExisting = true) : self
    {
    }
    public function withEnvironment(array $environment, bool $keepExisting = true) : self
    {
    }
    public function withPath(string $path) : self
    {
    }
    public function withTty(bool $tty = true) : self
    {
    }
    public function withPty(bool $pty = true) : self
    {
    }
    public function withTimeout(float|null $timeout) : self
    {
    }
    public function withQuiet(bool $quiet = true) : self
    {
    }
    public function withAllowFailure(bool $allowFailure = true) : self
    {
    }
    public function withNotify(bool $notify = true) : self
    {
    }
    public function withVerbosityLevel(VerbosityLevel $verbosityLevel) : self
    {
    }
    public function offsetExists(mixed $offset) : bool
    {
    }
    public function offsetGet(mixed $offset) : mixed
    {
    }
    public function offsetSet(mixed $offset, mixed $value) : void
    {
    }
    public function offsetUnset(mixed $offset) : void
    {
    }
}
namespace Castor;

class ContextDescriptor
{
    public function __construct(public readonly \Castor\Attribute\AsContext $contextAttribute, public readonly \ReflectionFunction $function)
    {
    }
}
namespace Castor;

class ContextRegistry
{
    private array $descriptors = [];
    private ?ContextDescriptor $default = null;
    public function add(ContextDescriptor $descriptor) : void
    {
    }
    public function setDefaultIfEmpty() : void
    {
    }
    public function getDefault() : ContextDescriptor
    {
    }
    public function get(string $name) : ContextDescriptor
    {
    }
    public function getNames() : array
    {
    }
}
namespace Castor;

class FunctionFinder
{
    private static bool $inFindFunctions = false;
    public static function findFunctions(string $path) : iterable
    {
    }
    public static function isInFindFunctions() : bool
    {
    }
    private static function doFindFunctions(iterable $files) : iterable
    {
    }
}
function castor_require(string $file) : void
{
}
namespace Castor;

class GlobalHelper
{
    private static Context $initialContext;
    private static \Psr\Log\LoggerInterface $logger;
    public static function setInitialContext(Context $initialContext) : void
    {
    }
    public static function getInitialContext() : Context
    {
    }
    public static function setLogger(\Psr\Log\LoggerInterface $logger) : void
    {
    }
    public static function getLogger() : \Psr\Log\LoggerInterface
    {
    }
}
namespace Castor;

class PathHelper
{
    public static function getRoot() : string
    {
    }
    public static function realpath(string $path) : string
    {
    }
}
namespace Castor;

class SluggerHelper
{
    private static \Symfony\Component\String\Slugger\AsciiSlugger $slugger;
    public static function slug(string $string) : string
    {
    }
}
namespace Castor\Stub;

class NodeVisitor extends \PhpParser\NodeVisitorAbstract
{
    private array $currentUseStatements = [];
    public function enterNode(\PhpParser\Node $node) : ?\PhpParser\Node
    {
    }
    public function leaveNode(\PhpParser\Node $node, bool $preserveStack = false) : ?int
    {
    }
}
namespace Castor\Stub;

final class StubsGenerator
{
    public function generateStubsIfNeeded(string $dest) : void
    {
    }
    public function generateStubs(string $dest) : void
    {
    }
    private function shouldGenerate(string $dest) : bool
    {
    }
}
namespace Castor;

class TaskDescriptor
{
    public function __construct(public readonly \Castor\Attribute\AsTask $taskAttribute, public readonly \ReflectionFunction $function)
    {
    }
}
namespace Castor;

enum VerbosityLevel : int
{
    case NOT_CONFIGURED = -1;
    case QUIET = 0;
    case NORMAL = 1;
    case VERBOSE = 2;
    case VERY_VERBOSE = 3;
    case DEBUG = 4;
    public static function fromSymfonyOutput(\Symfony\Component\Console\Output\OutputInterface $output) : self
    {
    }
    public function isNotConfigured() : bool
    {
    }
    public function isQuiet() : bool
    {
    }
    public function isVerbose() : bool
    {
    }
    public function isVeryVerbose() : bool
    {
    }
    public function isDebug() : bool
    {
    }
}
namespace Castor;

function parallel(callable ...$callbacks) : array
{
}
function run(string|array $command, array|null $environment = null, string|null $path = null, bool|null $tty = null, bool|null $pty = null, float|null $timeout = null, bool|null $quiet = null, bool|null $allowFailure = null, bool|null $notify = null, callable $callback = null, Context $context = null) : \Symfony\Component\Process\Process
{
}
function notify(string $message) : void
{
}
function watch(string $path, callable $function, Context $context = null) : void
{
}
function log(string $message, string $level = 'info', array $context = []) : void
{
}
function fs() : \Symfony\Component\Filesystem\Filesystem
{
}
function finder() : \Symfony\Component\Finder\Finder
{
}
function import(string $path) : void
{
}
namespace Symfony\Component\Console;

class Application implements \Symfony\Contracts\Service\ResetInterface
{
    private array $commands = [];
    private bool $wantHelps = false;
    private ?\Symfony\Component\Console\Command\Command $runningCommand = null;
    private string $name;
    private string $version;
    private ?\Symfony\Component\Console\CommandLoader\CommandLoaderInterface $commandLoader = null;
    private bool $catchExceptions = true;
    private bool $autoExit = true;
    private \Symfony\Component\Console\Input\InputDefinition $definition;
    private \Symfony\Component\Console\Helper\HelperSet $helperSet;
    private ?\Symfony\Contracts\EventDispatcher\EventDispatcherInterface $dispatcher = null;
    private Terminal $terminal;
    private string $defaultCommand;
    private bool $singleCommand = false;
    private bool $initialized = false;
    private ?\Symfony\Component\Console\SignalRegistry\SignalRegistry $signalRegistry = null;
    private array $signalsToDispatchEvent = [];
    public function __construct(string $name = 'UNKNOWN', string $version = 'UNKNOWN')
    {
    }
    public function setDispatcher(\Symfony\Contracts\EventDispatcher\EventDispatcherInterface $dispatcher) : void
    {
    }
    public function setCommandLoader(\Symfony\Component\Console\CommandLoader\CommandLoaderInterface $commandLoader)
    {
    }
    public function getSignalRegistry() : \Symfony\Component\Console\SignalRegistry\SignalRegistry
    {
    }
    public function setSignalsToDispatchEvent(int ...$signalsToDispatchEvent)
    {
    }
    public function run(\Symfony\Component\Console\Input\InputInterface $input = null, \Symfony\Component\Console\Output\OutputInterface $output = null) : int
    {
    }
    public function doRun(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output)
    {
    }
    public function reset()
    {
    }
    public function setHelperSet(\Symfony\Component\Console\Helper\HelperSet $helperSet)
    {
    }
    public function getHelperSet() : \Symfony\Component\Console\Helper\HelperSet
    {
    }
    public function setDefinition(\Symfony\Component\Console\Input\InputDefinition $definition)
    {
    }
    public function getDefinition() : \Symfony\Component\Console\Input\InputDefinition
    {
    }
    public function complete(\Symfony\Component\Console\Completion\CompletionInput $input, \Symfony\Component\Console\Completion\CompletionSuggestions $suggestions) : void
    {
    }
    public function getHelp() : string
    {
    }
    public function areExceptionsCaught() : bool
    {
    }
    public function setCatchExceptions(bool $boolean)
    {
    }
    public function isAutoExitEnabled() : bool
    {
    }
    public function setAutoExit(bool $boolean)
    {
    }
    public function getName() : string
    {
    }
    public function setName(string $name)
    {
    }
    public function getVersion() : string
    {
    }
    public function setVersion(string $version)
    {
    }
    public function getLongVersion()
    {
    }
    public function register(string $name) : \Symfony\Component\Console\Command\Command
    {
    }
    public function addCommands(array $commands)
    {
    }
    public function add(\Symfony\Component\Console\Command\Command $command)
    {
    }
    public function get(string $name)
    {
    }
    public function has(string $name) : bool
    {
    }
    public function getNamespaces() : array
    {
    }
    public function findNamespace(string $namespace) : string
    {
    }
    public function find(string $name)
    {
    }
    public function all(string $namespace = null)
    {
    }
    public static function getAbbreviations(array $names) : array
    {
    }
    public function renderThrowable(\Throwable $e, \Symfony\Component\Console\Output\OutputInterface $output) : void
    {
    }
    protected function doRenderThrowable(\Throwable $e, \Symfony\Component\Console\Output\OutputInterface $output) : void
    {
    }
    protected function configureIO(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output)
    {
    }
    protected function doRunCommand(\Symfony\Component\Console\Command\Command $command, \Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output)
    {
    }
    protected function getCommandName(\Symfony\Component\Console\Input\InputInterface $input) : ?string
    {
    }
    protected function getDefaultInputDefinition() : \Symfony\Component\Console\Input\InputDefinition
    {
    }
    protected function getDefaultCommands() : array
    {
    }
    protected function getDefaultHelperSet() : \Symfony\Component\Console\Helper\HelperSet
    {
    }
    private function getAbbreviationSuggestions(array $abbrevs) : string
    {
    }
    public function extractNamespace(string $name, int $limit = null) : string
    {
    }
    private function findAlternatives(string $name, iterable $collection) : array
    {
    }
    public function setDefaultCommand(string $commandName, bool $isSingleCommand = false) : static
    {
    }
    public function isSingleCommand() : bool
    {
    }
    private function splitStringByWidth(string $string, int $width) : array
    {
    }
    private function extractAllNamespaces(string $name) : array
    {
    }
    private function init() : void
    {
    }
}
namespace Symfony\Component\Console\Input;

class InputArgument
{
    public const REQUIRED = 1;
    public const OPTIONAL = 2;
    public const IS_ARRAY = 4;
    private string $name;
    private int $mode;
    private string|int|bool|array|null|float $default;
    private array|\Closure $suggestedValues;
    private string $description;
    public function __construct(string $name, int $mode = null, string $description = '', string|bool|int|float|array $default = null, \Closure|array $suggestedValues = [])
    {
    }
    public function getName() : string
    {
    }
    public function isRequired() : bool
    {
    }
    public function isArray() : bool
    {
    }
    public function setDefault(string|bool|int|float|array $default = null)
    {
    }
    public function getDefault() : string|bool|int|float|array|null
    {
    }
    public function hasCompletion() : bool
    {
    }
    public function complete(\Symfony\Component\Console\Completion\CompletionInput $input, \Symfony\Component\Console\Completion\CompletionSuggestions $suggestions) : void
    {
    }
    public function getDescription() : string
    {
    }
}
namespace Symfony\Component\Console\Input;

interface InputInterface
{
    public function getFirstArgument() : ?string
    {
    }
    public function hasParameterOption(string|array $values, bool $onlyParams = false) : bool
    {
    }
    public function getParameterOption(string|array $values, string|bool|int|float|array|null $default = false, bool $onlyParams = false)
    {
    }
    public function bind(InputDefinition $definition)
    {
    }
    public function validate()
    {
    }
    public function getArguments() : array
    {
    }
    public function getArgument(string $name)
    {
    }
    public function setArgument(string $name, mixed $value)
    {
    }
    public function hasArgument(string $name) : bool
    {
    }
    public function getOptions() : array
    {
    }
    public function getOption(string $name)
    {
    }
    public function setOption(string $name, mixed $value)
    {
    }
    public function hasOption(string $name) : bool
    {
    }
    public function isInteractive() : bool
    {
    }
    public function setInteractive(bool $interactive)
    {
    }
}
namespace Symfony\Component\Console\Input;

class InputOption
{
    public const VALUE_NONE = 1;
    public const VALUE_REQUIRED = 2;
    public const VALUE_OPTIONAL = 4;
    public const VALUE_IS_ARRAY = 8;
    public const VALUE_NEGATABLE = 16;
    private string $name;
    private string|array|null $shortcut;
    private int $mode;
    private string|int|bool|array|null|float $default;
    private array|\Closure $suggestedValues;
    private string $description;
    public function __construct(string $name, string|array $shortcut = null, int $mode = null, string $description = '', string|bool|int|float|array $default = null, array|\Closure $suggestedValues = [])
    {
    }
    public function getShortcut() : ?string
    {
    }
    public function getName() : string
    {
    }
    public function acceptValue() : bool
    {
    }
    public function isValueRequired() : bool
    {
    }
    public function isValueOptional() : bool
    {
    }
    public function isArray() : bool
    {
    }
    public function isNegatable() : bool
    {
    }
    public function setDefault(string|bool|int|float|array $default = null)
    {
    }
    public function getDefault() : string|bool|int|float|array|null
    {
    }
    public function getDescription() : string
    {
    }
    public function hasCompletion() : bool
    {
    }
    public function complete(\Symfony\Component\Console\Completion\CompletionInput $input, \Symfony\Component\Console\Completion\CompletionSuggestions $suggestions) : void
    {
    }
    public function equals(self $option) : bool
    {
    }
}
namespace Symfony\Component\Console\Output;

interface OutputInterface
{
    public const VERBOSITY_QUIET = 16;
    public const VERBOSITY_NORMAL = 32;
    public const VERBOSITY_VERBOSE = 64;
    public const VERBOSITY_VERY_VERBOSE = 128;
    public const VERBOSITY_DEBUG = 256;
    public const OUTPUT_NORMAL = 1;
    public const OUTPUT_RAW = 2;
    public const OUTPUT_PLAIN = 4;
    public function write(string|iterable $messages, bool $newline = false, int $options = 0)
    {
    }
    public function writeln(string|iterable $messages, int $options = 0)
    {
    }
    public function setVerbosity(int $level)
    {
    }
    public function getVerbosity() : int
    {
    }
    public function isQuiet() : bool
    {
    }
    public function isVerbose() : bool
    {
    }
    public function isVeryVerbose() : bool
    {
    }
    public function isDebug() : bool
    {
    }
    public function setDecorated(bool $decorated)
    {
    }
    public function isDecorated() : bool
    {
    }
    public function setFormatter(\Symfony\Component\Console\Formatter\OutputFormatterInterface $formatter)
    {
    }
    public function getFormatter() : \Symfony\Component\Console\Formatter\OutputFormatterInterface
    {
    }
}
namespace Symfony\Component\Console\Style;

class SymfonyStyle extends OutputStyle
{
    public const MAX_LINE_LENGTH = 120;
    private \Symfony\Component\Console\Input\InputInterface $input;
    private \Symfony\Component\Console\Output\OutputInterface $output;
    private \Symfony\Component\Console\Helper\SymfonyQuestionHelper $questionHelper;
    private \Symfony\Component\Console\Helper\ProgressBar $progressBar;
    private int $lineLength;
    private \Symfony\Component\Console\Output\TrimmedBufferOutput $bufferedOutput;
    public function __construct(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output)
    {
    }
    public function block(string|array $messages, string $type = null, string $style = null, string $prefix = ' ', bool $padding = false, bool $escape = true)
    {
    }
    public function title(string $message)
    {
    }
    public function section(string $message)
    {
    }
    public function listing(array $elements)
    {
    }
    public function text(string|array $message)
    {
    }
    public function comment(string|array $message)
    {
    }
    public function success(string|array $message)
    {
    }
    public function error(string|array $message)
    {
    }
    public function warning(string|array $message)
    {
    }
    public function note(string|array $message)
    {
    }
    public function info(string|array $message)
    {
    }
    public function caution(string|array $message)
    {
    }
    public function table(array $headers, array $rows)
    {
    }
    public function horizontalTable(array $headers, array $rows)
    {
    }
    public function definitionList(string|array|\Symfony\Component\Console\Helper\TableSeparator ...$list)
    {
    }
    public function ask(string $question, string $default = null, callable $validator = null) : mixed
    {
    }
    public function askHidden(string $question, callable $validator = null) : mixed
    {
    }
    public function confirm(string $question, bool $default = true) : bool
    {
    }
    public function choice(string $question, array $choices, mixed $default = null, bool $multiSelect = false) : mixed
    {
    }
    public function progressStart(int $max = 0)
    {
    }
    public function progressAdvance(int $step = 1)
    {
    }
    public function progressFinish()
    {
    }
    public function createProgressBar(int $max = 0) : \Symfony\Component\Console\Helper\ProgressBar
    {
    }
    public function progressIterate(iterable $iterable, int $max = null) : iterable
    {
    }
    public function askQuestion(\Symfony\Component\Console\Question\Question $question) : mixed
    {
    }
    public function writeln(string|iterable $messages, int $type = self::OUTPUT_NORMAL)
    {
    }
    public function write(string|iterable $messages, bool $newline = false, int $type = self::OUTPUT_NORMAL)
    {
    }
    public function newLine(int $count = 1)
    {
    }
    public function getErrorStyle() : self
    {
    }
    public function createTable() : \Symfony\Component\Console\Helper\Table
    {
    }
    private function getProgressBar() : \Symfony\Component\Console\Helper\ProgressBar
    {
    }
    private function autoPrependBlock() : void
    {
    }
    private function autoPrependText() : void
    {
    }
    private function writeBuffer(string $message, bool $newLine, int $type) : void
    {
    }
    private function createBlock(iterable $messages, string $type = null, string $style = null, string $prefix = ' ', bool $padding = false, bool $escape = false) : array
    {
    }
}
namespace Symfony\Component\Filesystem;

class Filesystem
{
    private static $lastError;
    public function copy(string $originFile, string $targetFile, bool $overwriteNewerFiles = false)
    {
    }
    public function mkdir(string|iterable $dirs, int $mode = 0777)
    {
    }
    public function exists(string|iterable $files) : bool
    {
    }
    public function touch(string|iterable $files, int $time = null, int $atime = null)
    {
    }
    public function remove(string|iterable $files)
    {
    }
    private static function doRemove(array $files, bool $isRecursive) : void
    {
    }
    public function chmod(string|iterable $files, int $mode, int $umask = 00, bool $recursive = false)
    {
    }
    public function chown(string|iterable $files, string|int $user, bool $recursive = false)
    {
    }
    public function chgrp(string|iterable $files, string|int $group, bool $recursive = false)
    {
    }
    public function rename(string $origin, string $target, bool $overwrite = false)
    {
    }
    private function isReadable(string $filename) : bool
    {
    }
    public function symlink(string $originDir, string $targetDir, bool $copyOnWindows = false)
    {
    }
    public function hardlink(string $originFile, string|iterable $targetFiles)
    {
    }
    private function linkException(string $origin, string $target, string $linkType) : never
    {
    }
    public function readlink(string $path, bool $canonicalize = false) : ?string
    {
    }
    public function makePathRelative(string $endPath, string $startPath) : string
    {
    }
    public function mirror(string $originDir, string $targetDir, \Traversable $iterator = null, array $options = [])
    {
    }
    public function isAbsolutePath(string $file) : bool
    {
    }
    public function tempnam(string $dir, string $prefix, string $suffix = '') : string
    {
    }
    public function dumpFile(string $filename, $content)
    {
    }
    public function appendToFile(string $filename, $content)
    {
    }
    private function toIterable(string|iterable $files) : iterable
    {
    }
    private function getSchemeAndHierarchy(string $filename) : array
    {
    }
    private static function assertFunctionExists(string $func) : void
    {
    }
    private static function box(string $func, mixed ...$args) : mixed
    {
    }
    public static function handleError(int $type, string $msg) : void
    {
    }
}
namespace Symfony\Component\Filesystem;

final class Path
{
    private const CLEANUP_THRESHOLD = 1250;
    private const CLEANUP_SIZE = 1000;
    private static $buffer = [];
    private static $bufferSize = 0;
    public static function canonicalize(string $path) : string
    {
    }
    public static function normalize(string $path) : string
    {
    }
    public static function getDirectory(string $path) : string
    {
    }
    public static function getHomeDirectory() : string
    {
    }
    public static function getRoot(string $path) : string
    {
    }
    public static function getFilenameWithoutExtension(string $path, string $extension = null) : string
    {
    }
    public static function getExtension(string $path, bool $forceLowerCase = false) : string
    {
    }
    public static function hasExtension(string $path, $extensions = null, bool $ignoreCase = false) : bool
    {
    }
    public static function changeExtension(string $path, string $extension) : string
    {
    }
    public static function isAbsolute(string $path) : bool
    {
    }
    public static function isRelative(string $path) : bool
    {
    }
    public static function makeAbsolute(string $path, string $basePath) : string
    {
    }
    public static function makeRelative(string $path, string $basePath) : string
    {
    }
    public static function isLocal(string $path) : bool
    {
    }
    public static function getLongestCommonBasePath(string ...$paths) : ?string
    {
    }
    public static function join(string ...$paths) : string
    {
    }
    public static function isBasePath(string $basePath, string $ofPath) : bool
    {
    }
    private static function findCanonicalParts(string $root, string $pathWithoutRoot) : array
    {
    }
    private static function split(string $path) : array
    {
    }
    private static function toLower(string $string) : string
    {
    }
    private function __construct()
    {
    }
}
namespace Symfony\Component\Finder;

/**
@implements
*/
class Finder implements \IteratorAggregate, \Countable
{
    public const IGNORE_VCS_FILES = 1;
    public const IGNORE_DOT_FILES = 2;
    public const IGNORE_VCS_IGNORED_FILES = 4;
    private int $mode = 0;
    private array $names = [];
    private array $notNames = [];
    private array $exclude = [];
    private array $filters = [];
    private array $depths = [];
    private array $sizes = [];
    private bool $followLinks = false;
    private bool $reverseSorting = false;
    private \Closure|int|false $sort = false;
    private int $ignore = 0;
    private array $dirs = [];
    private array $dates = [];
    private array $iterators = [];
    private array $contains = [];
    private array $notContains = [];
    private array $paths = [];
    private array $notPaths = [];
    private bool $ignoreUnreadableDirs = false;
    private static array $vcsPatterns = ['.svn', '_svn', 'CVS', '_darcs', '.arch-params', '.monotone', '.bzr', '.git', '.hg'];
    public function __construct()
    {
    }
    public static function create() : static
    {
    }
    public function directories() : static
    {
    }
    public function files() : static
    {
    }
    public function depth(string|int|array $levels) : static
    {
    }
    public function date(string|array $dates) : static
    {
    }
    public function name(string|array $patterns) : static
    {
    }
    public function notName(string|array $patterns) : static
    {
    }
    public function contains(string|array $patterns) : static
    {
    }
    public function notContains(string|array $patterns) : static
    {
    }
    public function path(string|array $patterns) : static
    {
    }
    public function notPath(string|array $patterns) : static
    {
    }
    public function size(string|int|array $sizes) : static
    {
    }
    public function exclude(string|array $dirs) : static
    {
    }
    public function ignoreDotFiles(bool $ignoreDotFiles) : static
    {
    }
    public function ignoreVCS(bool $ignoreVCS) : static
    {
    }
    public function ignoreVCSIgnored(bool $ignoreVCSIgnored) : static
    {
    }
    public static function addVCSPattern(string|array $pattern)
    {
    }
    public function sort(\Closure $closure) : static
    {
    }
    public function sortByExtension() : static
    {
    }
    public function sortByName(bool $useNaturalSort = false) : static
    {
    }
    public function sortByCaseInsensitiveName(bool $useNaturalSort = false) : static
    {
    }
    public function sortBySize() : static
    {
    }
    public function sortByType() : static
    {
    }
    public function sortByAccessedTime() : static
    {
    }
    public function reverseSorting() : static
    {
    }
    public function sortByChangedTime() : static
    {
    }
    public function sortByModifiedTime() : static
    {
    }
    public function filter(\Closure $closure) : static
    {
    }
    public function followLinks() : static
    {
    }
    public function ignoreUnreadableDirs(bool $ignore = true) : static
    {
    }
    public function in(string|array $dirs) : static
    {
    }
    public function getIterator() : \Iterator
    {
    }
    public function append(iterable $iterator) : static
    {
    }
    public function hasResults() : bool
    {
    }
    public function count() : int
    {
    }
    private function searchInDirectory(string $dir) : \Iterator
    {
    }
    private function normalizeDir(string $dir) : string
    {
    }
}
namespace Symfony\Component\Process;

/**
@implements
*/
class Process implements \IteratorAggregate
{
    public const ERR = 'err';
    public const OUT = 'out';
    public const STATUS_READY = 'ready';
    public const STATUS_STARTED = 'started';
    public const STATUS_TERMINATED = 'terminated';
    public const STDIN = 0;
    public const STDOUT = 1;
    public const STDERR = 2;
    public const TIMEOUT_PRECISION = 0.2;
    public const ITER_NON_BLOCKING = 1;
    public const ITER_KEEP_OUTPUT = 2;
    public const ITER_SKIP_OUT = 4;
    public const ITER_SKIP_ERR = 8;
    private $callback;
    private $hasCallback = false;
    private $commandline;
    private $cwd;
    private $env = [];
    private $input;
    private $starttime;
    private $lastOutputTime;
    private $timeout;
    private $idleTimeout;
    private $exitcode;
    private $fallbackStatus = [];
    private $processInformation;
    private $outputDisabled = false;
    private $stdout;
    private $stderr;
    private $process;
    private $status = self::STATUS_READY;
    private $incrementalOutputOffset = 0;
    private $incrementalErrorOutputOffset = 0;
    private $tty = false;
    private $pty;
    private $options = ['suppress_errors' => true, 'bypass_shell' => true];
    private $useFileHandles = false;
    private $processPipes;
    private $latestSignal;
    private static $sigchild;
    public static $exitCodes = [0 => 'OK', 1 => 'General error', 2 => 'Misuse of shell builtins', 126 => 'Invoked command cannot execute', 127 => 'Command not found', 128 => 'Invalid exit argument', 129 => 'Hangup', 130 => 'Interrupt', 131 => 'Quit and dump core', 132 => 'Illegal instruction', 133 => 'Trace/breakpoint trap', 134 => 'Process aborted', 135 => 'Bus error: "access to undefined portion of memory object"', 136 => 'Floating point exception: "erroneous arithmetic operation"', 137 => 'Kill (terminate immediately)', 138 => 'User-defined 1', 139 => 'Segmentation violation', 140 => 'User-defined 2', 141 => 'Write to pipe with no one reading', 142 => 'Signal raised by alarm', 143 => 'Termination (request to terminate)', 145 => 'Child process terminated, stopped (or continued*)', 146 => 'Continue if stopped', 147 => 'Stop executing temporarily', 148 => 'Terminal stop signal', 149 => 'Background process attempting to read from tty ("in")', 150 => 'Background process attempting to write to tty ("out")', 151 => 'Urgent data available on socket', 152 => 'CPU time limit exceeded', 153 => 'File size limit exceeded', 154 => 'Signal raised by timer counting virtual time: "virtual timer expired"', 155 => 'Profiling timer expired', 157 => 'Pollable event', 159 => 'Bad syscall'];
    public function __construct(array $command, string $cwd = null, array $env = null, mixed $input = null, ?float $timeout = 60)
    {
    }
    public static function fromShellCommandline(string $command, string $cwd = null, array $env = null, mixed $input = null, ?float $timeout = 60) : static
    {
    }
    public function __sleep() : array
    {
    }
    public function __wakeup()
    {
    }
    public function __destruct()
    {
    }
    public function __clone()
    {
    }
    public function run(callable $callback = null, array $env = []) : int
    {
    }
    public function mustRun(callable $callback = null, array $env = []) : static
    {
    }
    public function start(callable $callback = null, array $env = [])
    {
    }
    public function restart(callable $callback = null, array $env = []) : static
    {
    }
    public function wait(callable $callback = null) : int
    {
    }
    public function waitUntil(callable $callback) : bool
    {
    }
    public function getPid() : ?int
    {
    }
    public function signal(int $signal) : static
    {
    }
    public function disableOutput() : static
    {
    }
    public function enableOutput() : static
    {
    }
    public function isOutputDisabled() : bool
    {
    }
    public function getOutput() : string
    {
    }
    public function getIncrementalOutput() : string
    {
    }
    public function getIterator(int $flags = 0) : \Generator
    {
    }
    public function clearOutput() : static
    {
    }
    public function getErrorOutput() : string
    {
    }
    public function getIncrementalErrorOutput() : string
    {
    }
    public function clearErrorOutput() : static
    {
    }
    public function getExitCode() : ?int
    {
    }
    public function getExitCodeText() : ?string
    {
    }
    public function isSuccessful() : bool
    {
    }
    public function hasBeenSignaled() : bool
    {
    }
    public function getTermSignal() : int
    {
    }
    public function hasBeenStopped() : bool
    {
    }
    public function getStopSignal() : int
    {
    }
    public function isRunning() : bool
    {
    }
    public function isStarted() : bool
    {
    }
    public function isTerminated() : bool
    {
    }
    public function getStatus() : string
    {
    }
    public function stop(float $timeout = 10, int $signal = null) : ?int
    {
    }
    public function addOutput(string $line) : void
    {
    }
    public function addErrorOutput(string $line) : void
    {
    }
    public function getLastOutputTime() : ?float
    {
    }
    public function getCommandLine() : string
    {
    }
    public function getTimeout() : ?float
    {
    }
    public function getIdleTimeout() : ?float
    {
    }
    public function setTimeout(?float $timeout) : static
    {
    }
    public function setIdleTimeout(?float $timeout) : static
    {
    }
    public function setTty(bool $tty) : static
    {
    }
    public function isTty() : bool
    {
    }
    public function setPty(bool $bool) : static
    {
    }
    public function isPty() : bool
    {
    }
    public function getWorkingDirectory() : ?string
    {
    }
    public function setWorkingDirectory(string $cwd) : static
    {
    }
    public function getEnv() : array
    {
    }
    public function setEnv(array $env) : static
    {
    }
    public function getInput()
    {
    }
    public function setInput(mixed $input) : static
    {
    }
    public function checkTimeout()
    {
    }
    public function getStartTime() : float
    {
    }
    public function setOptions(array $options)
    {
    }
    public static function isTtySupported() : bool
    {
    }
    public static function isPtySupported() : bool
    {
    }
    private function getDescriptors() : array
    {
    }
    protected function buildCallback(callable $callback = null) : \Closure
    {
    }
    protected function updateStatus(bool $blocking)
    {
    }
    protected function isSigchildEnabled() : bool
    {
    }
    private function readPipesForOutput(string $caller, bool $blocking = false) : void
    {
    }
    private function validateTimeout(?float $timeout) : ?float
    {
    }
    private function readPipes(bool $blocking, bool $close) : void
    {
    }
    private function close() : int
    {
    }
    private function resetProcessData() : void
    {
    }
    private function doSignal(int $signal, bool $throwException) : bool
    {
    }
    private function prepareWindowsCommandLine(string $cmd, array &$env) : string
    {
    }
    private function requireProcessIsStarted(string $functionName) : void
    {
    }
    private function requireProcessIsTerminated(string $functionName) : void
    {
    }
    private function escapeArgument(?string $argument) : string
    {
    }
    private function replacePlaceholders(string $commandline, array $env) : string
    {
    }
    private function getDefaultEnv() : array
    {
    }
}